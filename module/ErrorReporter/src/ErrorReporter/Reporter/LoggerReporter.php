<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 17:53
 */

namespace ErrorReporter\Reporter;


class LoggerReporter implements ReporterInterface {

    /**
     * @var Zend\Log\Logger
     */
    private $logger;

    /**
     * @param Exception[] $errors
     */
    public function report( array $errors) {
        // @TODO Send error to logger

        // $this->logger->log( Zend\Log\Logger::ERR, $messageString );
    }
}