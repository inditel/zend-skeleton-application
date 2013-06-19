<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 16:03
 */

namespace ErrorReporter\Service;


class ErrorReporterService
{

    /**
     * Valid PHP error types
     * @var int
     */
    private $phpErrorTypes;
    /**
     * @var array
     */
    private $errors = array();

    /**
     * @param array $config
     */
    public function initFromConfig(array $config)
    {
        if (isset($config['error_types'])) {
            $this->setPhpErrorTypes($config['error_types']);
        }
    }

    /**
     *
     */
    public function endHandling()
    {

    }

    /**
     *
     */
    public function registerPhpErrorHandler()
    {
        set_error_handler(array($this, 'addPhpError'), $this->getPhpErrorTypes());
    }

    /**
     * @return int
     */
    public function getPhpErrorTypes()
    {
        return $this->phpErrorTypes;
    }

    /**
     * @param int $phpErrorTypes
     */
    public function setPhpErrorTypes($phpErrorTypes)
    {
        $this->phpErrorTypes = $phpErrorTypes;
    }

    /**
     *
     */
    public function registerShutdownHandler()
    {
        register_shutdown_function(array($this, 'addLastError'));
    }

    /**
     *
     */
    public function addLastError()
    {
        $error = error_get_last();
        $this->addPhpError($error['type'], $error['message'], $error['file'], $error['line']);
    }

    /**
     * @param int $errorCode
     * @param string $errorMessage
     * @param string $errorFile
     * @param int $errorLine
     */
    public function addPhpError($errorCode, $errorMessage, $errorFile, $errorLine)
    {
        $this->addException(new \ErrorException($errorMessage, $errorCode, 1, $errorFile, $errorLine, null));
    }

    /**
     * @param \Exception $exception
     */
    public function addException(\Exception $exception)
    {
        $this->errors[] = $exception;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }


}