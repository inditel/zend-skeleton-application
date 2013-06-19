<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 19:37
 */

namespace ErrorReporter\Reporter;


use Zend\ServiceManager\FactoryInterface;

class DbReporterFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return DbReporter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // @TODO Finish method

        // $config = $serviceLocator->get('Config');
        // $config = $config['error_reporter_db'];
        // $reporter = $this->createNewReporter();
        // $reporter->setLogger( $serviceLocator->get($config['adapter']) );
        // $reporter->initFromConfig( $config );
        // return $reporter
    }

}