<?php
$env = getenv('APP_ENV') ? : 'production';

$modules = array();
if ($env == 'development') {
    $modules = array(
        'ZendDeveloperTools',
        'BjyProfiler',
    );
}
return array(

    'modules' => array_merge(array(
        'Zf2Whoops',
        'Application',
    ), $modules),

    'module_listener_options' => array(

        'module_paths' => array(
            './module',
            './vendor',
        ),

        'config_glob_paths' => array(
            'config/autoload/{,*.}{production,staging,testing,development}.php',
        ),

        'config_cache_enabled' => ($env != 'development'),
        'config_cache_key' => "cache",
        'module_map_cache_enabled' => ($env != 'development'),
        'module_map_cache_key' => "cache",
        'cache_dir' => "data/cache/",
        'check_dependencies' => ($env == 'development'),
    ),
);