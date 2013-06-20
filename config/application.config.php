<?php
define('APP_ENV_PRODUCTION', 'production');
define('APP_ENV_DEVELOPMENT', 'development');
define('APP_ENV_TESTING', 'testing');
define('APP_ENV_STAGING', 'staging');

$env = getenv('APP_ENV') ? : APP_ENV_PRODUCTION;

$modules = array();
if ($env == APP_ENV_DEVELOPMENT) {
    $modules = array(
        'ZendDeveloperTools',
        'BjyProfiler',
        'CodeGenerator',
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
            './vendor/inditel',
        ),

        'config_glob_paths' => array(
            'config/autoload/{,*.}{production,staging,testing,development}.php',
        ),

        'config_cache_enabled' => ($env != APP_ENV_DEVELOPMENT),
        'config_cache_key' => "cache",
        'module_map_cache_enabled' => ($env != APP_ENV_DEVELOPMENT),
        'module_map_cache_key' => "cache",
        'cache_dir' => "data/cache/",
        'check_dependencies' => ($env == APP_ENV_DEVELOPMENT),
    ),
);