<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 20.06.13 16:10
 */

namespace Application\Controller;


use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexController2Test extends AbstractHttpControllerTestCase
{

    public function setUp()
    {
        $this->setApplicationConfig(
            include '../../../config/application.config.php'
        );
        parent::setUp();
    }

    public function test_indexAction()
    {
        $this->dispatch('/');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Application');
        $this->assertControllerName('Application\Controller\IndexController');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('home');
        $this->assertContains('ZF2 Skeleton Application', $this->getResponse()->getContent() );
    }

    public function test_jsonAction()
    {
        $this->dispatch('/json');
        $this->assertResponseStatusCode(200);
        $this->assertModuleName('Application');
        $this->assertControllerName('Application\Controller\IndexController');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('json');
        $this->assertEquals('{"x":10}', $this->getResponse()->getContent() );
    }
}
