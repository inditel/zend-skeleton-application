<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */


return array(
    'db' => array(
        'dsn' => 'mysql:dbname=moodwonder;host=localhost',
        'username' => 'root',
        'password' => '',
        'driver' => 'Pdo',
        'driver_options' => array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\';'
        ),
    ),
    'service_manager' => array(
        'factories' => array(
            'Zend\Db\Adapter\Adapter' => function ($sm) {
                $config = $sm->get('Configuration');
                $adapter = new \Zend\Db\Adapter\Adapter($config['db']);
                return $adapter;
            },
        ),
    ),
);
