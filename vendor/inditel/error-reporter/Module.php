<?php
namespace ErrorReporter;

use ErrorReporter\Service\ErrorReporterService;
use Zend\Mvc\MvcEvent;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $eventManager = $e->getApplication()->getEventManager();
        $eventManager->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this, 'onError'), 50);
        $eventManager->attach(MvcEvent::EVENT_RENDER_ERROR, array($this, 'onError'), 50);
        $eventManager->attach(MvcEvent::EVENT_FINISH, array($this, 'onFinishAfterPostDispatch'), -200); //-100 is postDispatch that commits or rollbacks transaction

        $locator = $e->getApplication()->getServiceManager();
        /* @var ErrorReporterService $errorService */
        $errorService = $locator->get('ErrorReporter');
        $errorService->startErrorHandling($e);
    }

    public function onError(MvcEvent $e)
    {
        $locator = $e->getApplication()->getServiceManager();
        /* @var ErrorReporterService $errorService */
        $errorService = $locator->get('ErrorReporter');

        $exception = $e->getParam('exception');
        $error = $e->getError();

        if ($e->isError() == false) {
            $error = ErrorReporterService::ERROR_UNDEFINED_ERROR;
        }
        $stopPropagation = false;

        if ($exception instanceof \Exception) {
            $errorService->addException($exception);
            if ($exception instanceof \PDOException) {
                $stopPropagation = true;
            }
        } elseif ($error != null) {
            $errorService->addRouterNoMatchError($error, $e->getControllerClass());
        }

        if ($stopPropagation) {
            $this->onFinishAfterPostDispatch($e);
        }

    }

    public function onFinishAfterPostDispatch(MvcEvent $e)
    {
        /* @var ErrorReporterService $errorService */
        $errorService = $e->getApplication()->getServiceManager()->get('ErrorReporter');
        $errorService->endErrorHandling();
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

}