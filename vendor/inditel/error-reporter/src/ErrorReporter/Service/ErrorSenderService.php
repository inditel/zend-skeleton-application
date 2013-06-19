<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver Leisalu
 * Date: 5.06.13 17:48
 */

namespace ErrorReporter\Service;


use Zend\Mail\Message;
use Zend\Mail\Transport\Sendmail as SendmailTransport;
use Zend\Mail\Transport\TransportInterface;
use Zend\Mime\Message as MimeMessage;
use Zend\Mime\Mime;
use Zend\Mime\Part;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\Parameters;
use Zend\View\Model\ViewModel;
use Zend\View\Renderer\PhpRenderer;

class ErrorSenderService implements ServiceLocatorAwareInterface
{

    /**
     * @var TransportInterface
     */
    private $transport;
    /**
     * @var array
     */
    private $config;
    /**
     * @var ServiceLocatorInterface
     */
    private $serviceLocator;

    public function send(array $errors)
    {
        $message = $this->getMessage($errors);

        if (!$this->transport) {
            $transport = new SendMailTransport();
        } else {
            $transport = $this->transport;
        }

        try {
            $transport->send($message);
        } catch (\Exception $e) {

        }
    }

    public function getMessage(array $errors)
    {
        $message = new Message();
        $message->setSubject($this->config['error_email']['subject']);

        if (isset($this->config['error_email']['from_email']) && $this->config['error_email']['from_email']) {
            $message->setFrom($this->config['error_email']['from_email'], $this->config['error_email']['from_name']);
        }

        foreach ($this->config['send_email_report_to'] as $info) {
            $message->addTo($info['email'], $info['name']);
        }

        $variables = $this->getMessageVariables($errors);
        $html = $this->getEmailBodyHtml($variables);
        $body = $this->getMessageBody($html);

        $message->setBody($body);
        $message->setEncoding("UTF-8");

        return $message;
    }

    public function getMessageVariables(array $errors)
    {

        $serverUrlHelper = $this->serviceLocator->get('ViewHelperManager')->get('ServerUrl');

        $variables = array(
            'errors' => $errors,
            'sub_templates' => $this->getSubTemplates(),
            'meta' => new Parameters(array(
                    'ip' => $this->getClientIp(),
                    'userAgent' => (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : null,
                    'url' => $serverUrlHelper(true), //$_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'] . $_SERVER['PHP_SELF'],
                    'postData' => $_POST,
                    'getData' => $_GET,
                    'sessionData' => isset($_SESSION) ? $_SESSION : array(),
                    'referer' => (isset($_SERVER['HTTP_REFERER'])) ? $_SERVER['HTTP_REFERER'] : null,
                    'requestTime' => new \DateTime(),
                    'requestDuration' => microtime(true) - REQUEST_MICROTIME,
                )
            )
        );

        return $variables;
    }

    public function getSubTemplates()
    {
        $subTemplates = array();
        foreach ($this->config['sub_templates'] as $subTemplate) {
            $subTemplates[] = array(
                'template' => $subTemplate['template'],
                'values' => $subTemplate['closure']($this->serviceLocator),
            );
        }
        return $subTemplates;
    }

    public function getClientIp()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } elseif (isset($_SERVER['REMOTE_ADDR'])) {
            $ip = $_SERVER['REMOTE_ADDR'];
        } else {
            $ip = 'unknown';
        }
        return $ip;
    }

    public function getEmailBodyHtml(array $variables)
    {
        /* @var PhpRenderer $phpRenderer */
        $phpRenderer = $this->serviceLocator->get('Zend\View\Renderer\PhpRenderer');

        $mailView = new ViewModel();
        $mailView->setTemplate($this->config['template']);
        $mailView->setVariables($variables);
        return $phpRenderer->render($mailView);
    }

    public function getMessageBody($html)
    {
        $html = new Part($html);
        $html->type = Mime::TYPE_HTML;
        $html->charset = 'utf-8';
        $parts[] = $html;

        $body = new MimeMessage();
        $body->setParts($parts);

        return $body;
    }

    /**
     * @param TransportInterface $transport
     */
    public function setTransport(TransportInterface $transport)
    {
        $this->transport = $transport;
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
        $config = $this->serviceLocator->get('Config');
        $this->config = $config['error_reporter'];
    }
}