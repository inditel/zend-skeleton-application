<?php
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