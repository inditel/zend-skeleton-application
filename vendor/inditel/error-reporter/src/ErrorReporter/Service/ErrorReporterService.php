<?php
namespace ErrorReporter\Service;


use ErrorReporter\Exception\RouterNoMatchException;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ErrorReporterService implements ServiceLocatorAwareInterface
{

    const ERROR_UNDEFINED_ERROR = "unknown_error";
    /**
     * @var \Exception
     */
    protected static $errorException;
    /**
     * @var array
     */
    private $config;
    /**
     * @var array
     */
    private $errors = array();
    /**
     * @var ServiceLocatorInterface
     */
    private $serviceLocator;

    /**
     * @param MvcEvent $e
     */
    public function startErrorHandling(MvcEvent $e)
    {
        set_error_handler(array($this, 'addPhpError'), E_ALL & ~E_STRICT);
        register_shutdown_function(array($this, 'endErrorHandlingWithFatal'));
    }

    /**
     *
     */
    public function endErrorHandlingWithFatal()
    {
        $error = error_get_last();
        //if ($error['type'] & (E_ALL & ~E_STRICT) != 0) {
        if ($error['type'] != E_STRICT) {
            $this->addPhpError($error['type'], $error['message'], $error['file'], $error['line']);
            $this->endErrorHandling();
        }
        //}
    }

    /**
     * @param $errorLevel
     * @param $errorMessage
     * @param $errorFile
     * @param $errorLine
     */
    public function addPhpError($errorLevel, $errorMessage, $errorFile, $errorLine)
    {
        if (error_reporting() == 0) { // Ignores errors suppressed with @
            return;
        }
        $errorException = new \ErrorException($errorMessage, 0, $errorLevel, $errorFile, $errorLine, static::$errorException);
        static::$errorException = $errorException;
        $this->errors[] = $errorException;
    }

    /**
     *
     */
    public function endErrorHandling()
    {

        if ($this->isPossibleToSendErrorsEmail()) {

            $this->serviceLocator->get('ErrorSender')->send($this->errors);
        }
        $this->errors = array(); //We have parsed all errors, this function might be called again, so remove all errors after parsing
    }

    /**
     * @return bool
     */
    public function isPossibleToSendErrorsEmail()
    {
        if (empty($this->errors)) {
            return false; //No errors, do nothing
        }

        if (!isset($this->config['send_email_report_to']) or !$this->config['send_email_report_to']) { //If mail sending is disabled
            return false;
        }

        if ($this->config['ignore_bot_404'] && $this->isBotRequest() && $this->hasOnlyIgnorableExceptions()) { //Do not send router-no-match errors with bot-requests to e-mails
            return false;
        }

        if ($this->config['ignore_404'] && $this->hasOnlyIgnorableExceptions()) { //Ignore normal user 404 requests
            return false;
        }

        return true;
    }

    /**
     * @param string $httpUserAgent
     * @return bool
     */
    public function isBotRequest($httpUserAgent = null)
    {
        if ($httpUserAgent == null) {
            $httpUserAgent = $_SERVER['HTTP_USER_AGENT'];
        }

        foreach ($this->config['bot_list'] as $bot) {
            if (stripos($httpUserAgent, $bot) !== false) {
                return true;
            }
        }

        return false;
    }

    /**
     * @return bool
     */
    protected function hasOnlyIgnorableExceptions()
    {
        $hasOnly = true;
        foreach ($this->errors as $error) {
            $hasOnly &= ($error instanceof RouterNoMatchException || $error instanceof \Zend\Authentication\Exception\RuntimeException);
        }

        return $hasOnly;
    }

    /**
     * @param \Exception $exception
     */
    public function addException(\Exception $exception)
    {
        $this->errors[] = $exception;
    }

    /**
     * @param string $error
     * @param string $controllerClass
     */
    public function addRouterNoMatchError($error, $controllerClass)
    {
        $this->errors[] = new RouterNoMatchException(sprintf('%1$s, %2$s', $error, $controllerClass));
    }

    /**
     * @return ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * @param ServiceLocatorInterface $serviceLocator
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        //@FIXME configuration setting in wrong place
        $config = $this->serviceLocator->get('Config');
        $this->config = $config['error_reporter'];
    }
}