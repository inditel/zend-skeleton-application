<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 19:37
 */

namespace ErrorReporter\Reporter;


use Zend\Log\LoggerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoggerReporterFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return LoggerReporter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $config = $config['error_reporter_logger'];
        $logger = $serviceLocator->get($config['logger']);
        $reporter = $this->getNewReporter($logger);
        return $reporter;
    }

    public function getNewReporter(LoggerInterface $logger)
    {
        return new LoggerReporter($logger);
    }

}