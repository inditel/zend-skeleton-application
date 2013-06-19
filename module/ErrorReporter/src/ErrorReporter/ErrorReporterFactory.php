<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 18:53
 */

namespace ErrorReporter;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ErrorReporterFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return ErrorReporter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $config = $config['error_reporter'];

        $reporter = $this->getNewErrorReporter();
        $reporter->initFromConfig($config);
        $reporter->setBotDetector($serviceLocator->get('BotDetector'));
        $reporter->registerPhpErrorHandler();
        $reporter->registerShutdownHandler();

        foreach ($config['reporters'] as $reporterIml) {
            $reporter->addReporter($serviceLocator->get($reporterIml));
        }

        return $reporter;
    }

    /**
     * @return ErrorReporter
     */
    public function getNewErrorReporter()
    {
        return new ErrorReporter();
    }

}