<?php

ini_set('display_errors', 0);

return array(

    'db' => array(
        'dsn' => 'mysql:dbname=zend-skeleton-application;host=localhost',
        'username' => 'root',
        'password' => '',
        'driver' => 'Pdo',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\';'
        ),
    ),

    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => 'Zend\Db\Adapter\AdapterServiceFactory',
            'Whoops' => 'Zf2Whoops\WhoopsFactory',
            'ErrorLogger' => 'Application\Log\ErrorLoggerFactory',
        ),
    ),

    'view_manager' => array(
        'display_not_found_reason' => false,
        'display_exceptions' => false,
    ),

    'assetic_configuration' => array(
        'buildOnRequest' => false,
    ),

    'whoops' => array(
        // Logger service name
        'logger' => 'ErrorLogger',

        // These exceptions will be ignored by Whoops and logger
        'ignored_exceptions' => array(
            'BjyAuthorize\Exception\UnAuthorizedException'
        ),
        // editor that Whoops PrettyPageHandler will use
        'editor' => 'sublime',

        // JsonHandler configuration
        'json_exceptions' => array(
            'display' => true,
            'ajax_only' => true,
            'show_trace' => true
        ),
    ),
);
