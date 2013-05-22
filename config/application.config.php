<?php
return array(

    'modules' => array(
        'Application',
        'ZendDeveloperTools',
    ),

    'module_listener_options' => array(

        'module_paths' => array(
            './module',
            './vendor',
        ),

        'config_glob_paths' => array(
            'config/autoload/{,*.}{global,local}.php',
        ),

        'config_cache_enabled' => true,
        'config_cache_key' => "config_cache",
        'module_map_cache_enabled' => true,
        'module_map_cache_key' => "module_map_cache",
        'cache_dir' => "data/cache/",
        'check_dependencies' => true,
    ),
);