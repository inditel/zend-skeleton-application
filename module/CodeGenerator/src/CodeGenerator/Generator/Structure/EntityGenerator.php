<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 12:31
 */

namespace CodeGenerator\Generator\Structure;

use CodeGenerator\Generator\AbstractClassGenerator;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;

class EntityGenerator extends AbstractClassGenerator
{

    const CONFIG_KEY = 'entity';

    /**
     * @return ClassGenerator
     */
    public function generate()
    {

        $class = parent::generate();

        $class->addUse($this->getFullClassName(AbstractEntityGenerator::CONFIG_KEY));
        $class->setExtendedClass($this->getClassName(AbstractEntityGenerator::CONFIG_KEY));

        return $class;
    }


}