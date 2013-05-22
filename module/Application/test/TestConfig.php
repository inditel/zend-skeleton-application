<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Oliver
 * Date: 22.05.13
 * Time: 10:26
 * To change this template use File | Settings | File Templates.
 */
return array(
    'modules' => array(
        'Application',
    ),
    'module_listener_options' => array(
        'config_glob_paths'    => array(
            '../../../config/autoload/{,*.}{global,local}.php',
        ),
        'module_paths' => array(
            'module',
            'vendor',
        ),
    ),
);