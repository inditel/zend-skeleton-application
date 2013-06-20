<?php
return array(
    'router' => require('routes/routes.php'),
    'service_manager' => array(
        'abstract_factories' => array(
            //'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            //'Zend\Log\LoggerAbstractServiceFactory',
        ),
        'factories' => array(

        ),
        'aliases' => array(
            'translator' => 'MvcTranslator',
        ),

    ),

    'di' => array(
        'allowed_controllers' => array(
            'Application\Controller\IndexController',
        ),
        'instance' => array(
            'preference' => array(
                'Zend\EventManager\EventManagerInterface' => 'EventManager',
                'Zend\ServiceManager\ServiceLocatorInterface' => 'ServiceManager',
                'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\Adapter',
            ),
        ),
    ),

    'translator' => array(
        'locale' => 'et_EE',
        'translation_file_patterns' => array(
            array(
                'type' => 'phpArray',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.php',
            ),
        ),
    ),

    'whoops' => array(
        'json_exceptions' => array(
            'display' => true,
            'ajax_only' => true,
            'show_trace' => true
        ),
        'logger' => 'Logger',
        'ignored_exceptions' => array(
            'BjyAuthorize\Exception\UnAuthorizedException'
        ),
        'editor' => 'sublime',
    ),

    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions' => true,
        'doctype' => 'HTML5',
        'not_found_template' => 'error/404',
        'exception_template' => 'error/index',
        'template_map' => array(
            'layout/layout' => __DIR__ . '/../view/layout/layout.phtml',
            'application/index/index' => __DIR__ . '/../view/application/index/index.phtml',
            'error/404' => __DIR__ . '/../view/error/404.phtml',
            'error/index' => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'Zend\View\Strategy\JsonStrategy'
        ),
    ),
);
