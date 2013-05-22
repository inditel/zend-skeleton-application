<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Oliver
 * Date: 22.05.13
 * Time: 9:35
 * To change this template use File | Settings | File Templates.
 */
namespace Application\Service;

class SampleService
{

    public function stuff($arg)
    {
        if ($arg == 10 or $arg == 120 )
            return true;
        return false;
    }

    public function notTested() {
        return false;
    }

}