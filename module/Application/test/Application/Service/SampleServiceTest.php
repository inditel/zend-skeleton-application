<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Oliver
 * Date: 22.05.13
 * Time: 10:06
 * To change this template use File | Settings | File Templates.
 */

namespace Application\Service;

class SampleServiceTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var SampleService
     */
    private $service;

    public function setUp()
    {
        $this->service = new SampleService();

    }

    public function testStuff()
    {
        $this->assertEquals($this->service->stuff(10), true);
        $this->assertEquals($this->service->stuff(8), false);
    }
}
