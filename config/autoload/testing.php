<?php
return array(
    'db' => array(

    ),

    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'BjyProfiler\Db\Adapter\ProfilingAdapterFactory',
            //'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
        ),
    ),

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
    ),

    'zenddevelopertools' => array(
        'profiler' => array(
            'enabled' => true,
            'strict' => false,
            'flush_early' => false,
            'cache_dir' => 'data/cache',
            'matcher' => array(),
            'collectors' => array(),
        ),
        'toolbar' => array(
            'enabled' => true,
            'auto_hide' => false,
            'position' => 'bottom',
            'version_check' => true,
            'entries' => array(),
        ),
    ),
);