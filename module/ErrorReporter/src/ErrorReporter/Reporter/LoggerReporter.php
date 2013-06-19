<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 17:53
 */

namespace ErrorReporter\Reporter;


use Zend\Log\LoggerInterface;

class LoggerReporter implements ReporterInterface
{

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param LoggerInterface $logger
     */
    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @param \Exception[] $errors
     */
    public function report(array $errors)
    {
        $messages = array();
        foreach ($errors as $error) {
            $messages = array_merge($messages, $this->exceptionToStringRec($error));
        }
        foreach ($messages as $message) {
            $this->logger->err($message['message'], array('trace' => $message['trace']));
        }
    }

    /**
     * @param \Exception $e
     * @return array
     */
    public function exceptionToStringRec(\Exception $e)
    {
        $data = array($this->exceptionToString($e));
        if ($e->getPrevious()) {
            $data = array_merge($data, $this->exceptionToStringRec($e->getPrevious()));
        }
        return $data;
    }

    /**
     * @param \Exception $e
     * @return string
     */
    public function exceptionToString(\Exception $e)
    {
        return array(
            'message' => $e->getCode() . ':' . $e->getMessage() . " " . $e->getFile() . ':' . $e->getLine() . "\n",
            'trace' => $e->getTraceAsString(),
        );
    }
}