<?php
$env = getenv('APP_ENV') ? : 'production';

$modules = array();
if ($env == 'development' || $env == 'testing') {
    $modules = array(
        'ZendDeveloperTools',
        'BjyProfiler',
    );
}

switch($env) {
    case 'production': $paths = 'production'; break;
    case 'staging': $paths = 'production,staging'; break;
    case 'testing': $paths = 'production,staging,testing'; break;
    case 'development': $paths = 'production,staging,testing,development'; break;

}

return array(

    'modules' => array_merge(array(
        //'Zf2Whoops',
        'AsseticBundle',
        'Application',
    ), $modules),

    'module_listener_options' => array(

        'module_paths' => array(
            './module',
            './vendor',
        ),

        'config_glob_paths' => array(
            'config/autoload/{,*.}{'.$paths.'}.php',
        ),

        'config_cache_enabled' => ($env != 'development' && $env != 'testing'),
        'config_cache_key' => "cache",
        'module_map_cache_enabled' => ($env != 'development' && $env != 'testing'),
        'module_map_cache_key' => "cache",
        'cache_dir' => "data/cache/",
        'check_dependencies' => ($env == 'development' && $env != 'testing'),
    ),
);