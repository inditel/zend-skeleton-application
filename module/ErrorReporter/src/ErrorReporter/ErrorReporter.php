<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 16:03
 */

namespace ErrorReporter;

use ErrorReporter\Exception\RouterNoMatchException;
use ErrorReporter\Excetion\BotDetectorServiceNotSetException;
use ErrorReporter\Reporter\ReporterInterface;

class ErrorReporter
{

    /**
     * Valid PHP error types
     * @var int
     */
    private $phpErrorTypes;
    /**
     * @var Exception[]
     */
    private $errors = array();
    /**
     * @var ReporterInterface[]
     */
    private $reporters = array();
    /**
     * @var boolean
     */
    private $reportBot404;
    /**
     * @var boolean
     */
    private $report404;
    /**
     * @var BotDetectorInterface
     */
    private $botDetector;

    /**
     * @return string
     */
    public static function getClassName()
    {
        return get_called_class();
    }

    /**
     * @return ReporterInterface[]
     */
    public function getReporters()
    {
        return $this->reporters;
    }

    /**
     * @return \ErrorReporter\BotDetector
     */
    public function getBotDetector()
    {
        return $this->botDetector;
    }

    /**
     * @param \ErrorReporter\BotDetector $botDetector
     */
    public function setBotDetector($botDetector)
    {
        $this->botDetector = $botDetector;
    }

    /**
     * @param array $config
     */
    public function initFromConfig(array $config)
    {
        if (isset($config['error_types'])) {
            $this->setPhpErrorTypes($config['error_types']);
        }

        if (isset($config['report_bot_404'])) {
            $this->setReportBot404((bool)$config['report_bot_404']);
        }

        if (isset($config['report_404'])) {
            $this->setReport404((bool)$config['report_404']);
        }
    }

    /**
     *
     */
    public function report()
    {

        if (!$this->shouldReport()) {
            return;
        }

        foreach ($this->reporters as $reporter) {
            try {
                $reporter->report($this->getErrors());
            } catch (\Exception $e) {
                $this->addException($e);
            }
        }

        $this->errors = array();
    }

    /**
     * @return bool
     */
    public function shouldReport()
    {
        foreach ($this->getErrors() as $exception) {
            if ($this->shouldReportException($exception)) {
                return true;
            }
        }
        return false;
    }

    /**
     * @return array
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function shouldReportException(\Exception $exception)
    {

        if (!$this->getReportBot404() && $this->isBot404Exception($exception)) {
            return false;
        }

        if (!$this->getReport404() && $this->is404Exception($exception)) {
            return false;
        }

        return true;
    }

    /**
     * @return mixed
     */
    public function getReportBot404()
    {
        return $this->reportBot404;
    }

    /**
     * @param mixed $reportBot404
     */
    public function setReportBot404($reportBot404)
    {
        $this->reportBot404 = $reportBot404;
    }

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function isBot404Exception(\Exception $exception)
    {
        if (!$this->is404Exception($exception)) {
            return false;
        }

        return isset($this->botDetector) && $this->botDetector->isBot();
    }

    /**
     * @param \Exception $exception
     * @return bool
     */
    public function is404Exception(\Exception $exception)
    {
        return $exception instanceof RouterNoMatchException;
    }

    /**
     * @return boolean
     */
    public function getReport404()
    {
        return $this->report404;
    }

    /**
     * @param boolean $report404
     */
    public function setReport404($report404)
    {
        $this->report404 = $report404;
    }

    /**
     * @param \Exception $exception
     */
    public function addException(\Exception $exception)
    {
        $this->errors[] = $exception;
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
        register_shutdown_function(array($this, 'addLastErrorAndReport'));
    }

    /**
     *
     */
    public function addLastErrorAndReport()
    {
        $error = error_get_last();
        $this->addPhpError($error['type'], $error['message'], $error['file'], $error['line']);
        $this->report();
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
     * @param ReporterInterface $reporter
     */
    public function addReporter(ReporterInterface $reporter)
    {
        $this->reporters[] = $reporter;
    }


}