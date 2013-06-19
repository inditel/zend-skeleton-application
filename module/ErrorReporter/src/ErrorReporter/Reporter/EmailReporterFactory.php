<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 19:37
 */

namespace ErrorReporter\Reporter;


use Zend\ServiceManager\FactoryInterface;

class EmailReporterFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return EmailReporter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        // @TODO Finish method

        // $config = $serviceLocator->get('Config');
        // $config = $config['error_reporter_email'];
        // $reporter = $this->createNewReporter();
        // $reporter->setTransporter( $serviceLocator->get($config['transporter']));
        // $reporter->setPhpRenderer( $serviceLocator->get('Zend\View\Renderer\PhpRenderer'));
        // $reporter->initFromConfig( $config );
        // return $reporter
    }

}