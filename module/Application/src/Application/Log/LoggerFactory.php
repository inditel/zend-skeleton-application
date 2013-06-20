<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 20.06.13 15:52
 */

namespace Application\Log;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class LoggerFactory implements FactoryInterface{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $filename = 'log_' . date('F') . '.txt';
        $log = new \Zend\Log\Logger();
        $writer = new \Zend\Log\Writer\Stream('./data/logs/' . $filename);
        $log->addWriter($writer);
        return $log;
    }
}