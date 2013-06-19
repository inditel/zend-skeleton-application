<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 13:50
 */

namespace CodeGenerator\Generator\Structure;

use CodeGenerator\Generator\AbstractClassGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;

class ControllerGenerator extends AbstractClassGenerator
{

    const CONFIG_KEY = 'controller';

    /**
     * @return ClassGenerator
     */
    public function generate()
    {

        $class = parent::generate();

        $class->addUse($this->getFullClassName(ServiceGenerator::CONFIG_KEY));

        return $class;
    }

}