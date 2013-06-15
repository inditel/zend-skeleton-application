<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 27.05.13 18:16
 */

namespace CodeGenerator\Generator\Authentication;


use CodeGenerator\Generator\AbstractGenerator;
use CodeGenerator\Generator\AbstractGeneratorGroup;

class AuthenticationGenerator extends AbstractGeneratorGroup {

    private $config;

    public function __construct( array $config ) {
        $this->config = $config;
    }

    /**
     * @return AbstractGenerator[]
     */
    public function getGenerators()
    {
        return array(

        );
    }
}