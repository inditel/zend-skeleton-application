<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 19:37
 */

namespace ErrorReporter\Reporter;


use Zend\Db\TableGateway\TableGateway;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class DbReporterFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return DbReporter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $config = $config['error_reporter_db'];
        $table = $serviceLocator->get($config['table_gateway']);
        $reporter = $this->getNewReporter($table);
        return $reporter;
    }

    public function getNewReporter(TableGateway $table)
    {
        return new DbReporter($table);
    }

}