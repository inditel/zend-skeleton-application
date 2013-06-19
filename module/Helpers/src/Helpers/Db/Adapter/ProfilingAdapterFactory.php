<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 10:01
 */

namespace Helpers\Db\Adapter;


use BjyProfiler\Db\Adapter\ProfilingAdapter;
use BjyProfiler\Db\Profiler\Profiler;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class ProfilingAdapterFactory implements FactoryInterface
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Configuration');
        $adapter = new ProfilingAdapter($config['db']);

        $adapter->setProfiler(new Profiler);
        if (isset($dbParams['options']) && is_array($dbParams['options'])) {
            $options = $dbParams['options'];
        } else {
            $options = array();
        }
        $adapter->injectProfilingStatementPrototype($options);
        return $adapter;
    }
}