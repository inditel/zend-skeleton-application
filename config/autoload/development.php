<?php
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

    'assetic_configuration' => array(
        'buildOnRequest' => true,
    ),

);
