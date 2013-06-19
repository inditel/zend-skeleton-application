
Installing project
==================

* Start composer project
* Load inditel/zend-skeleton-application


Setting up local development environment
========================================

Add this line to your apache config

        SetEnv "APP_ENV" "development"

If you want to test staging, testing or production, update .htaccess file.
Uncomment
        # SetEnv "APP_ENV" "development"

**Be careful not to commit with it!**


Setting up PHPStorm environment
===============================

* Open project settings -> PHP -> PHPUnit.
Set "Use custom loader" and choose vendor/autoload.php file.


To start unit testing
=====================

* Open Run/Debug Configurations
 - Add new PHPUnit configuration
 - Add name
 - Select "Defined in the configuration file"
 - Check "Use alternative configuration file"
 - Choose module/YOUR_MODULE/test/phpunit.xml
