<?php
namespace Application\Service;

class SampleService
{

    public function stuff($arg)
    {
        return $arg == 10;
    }

    public function notTested()
    {
        return false;
    }

}