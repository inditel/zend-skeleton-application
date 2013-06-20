ZF2 skeleton application with extras
----------------------------------------

**Integrated modules:**
* [inditel/Zf2Whoops](https://github.com/inditel/zf2-whoops)
* [ZendDeveloperTools](https://github.com/zendframework/ZendDeveloperTools)
* [BjyProfiler](https://github.com/bjyoungblood/BjyProfiler) (Db profiler for ZendDeveloperTools)
* [Assetic](https://github.com/kriswallsmith/assetic)
* [ZF2 assetic module](https://github.com/widmogrod/zf2-assetic-module)
* [phpunit](http://phpunit.de/)
* [Zend Framework 2](http://framework.zend.com/)
* Sample unit tests for controllers and services.


Installing project
----------------------------------------

* Start composer project
* Load inditel/zend-skeleton-application


Setting up local development environment
----------------------------------------

Add this line to your apache config

        SetEnv "APP_ENV" "development"

If you want to test staging, testing or production, update .htaccess file.
Uncomment
        # SetEnv "APP_ENV" "development"
**Be careful not to commit with it!**


To start unit testing (PHPStorm)
--------------------------------

* Open project settings -> PHP -> PHPUnit.
Set "Use custom loader" and choose vendor/autoload.php file.

* Open Run/Debug Configurations
 - Add new PHPUnit configuration
 - Add name
 - Select "Defined in the configuration file"
 - Check "Use alternative configuration file"
 - Choose module/YOUR_MODULE/test/phpunit.xml
