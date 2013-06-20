<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 20.06.13 15:52
 */

namespace Application\Log;


use Zend\Log\Logger;
use Zend\Log\Writer\Stream;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ErrorLoggerFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $dir = './data/logs';
        if (!is_dir($dir)) {
            mkdir($dir);
        }
        $log = new Logger();
        $log->addWriter(new Stream($dir . '/error-log-' . date('Y-m') . '.txt'));
        return $log;
    }
}