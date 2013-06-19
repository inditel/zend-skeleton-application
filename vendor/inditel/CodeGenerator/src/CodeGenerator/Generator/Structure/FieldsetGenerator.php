<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 13:50
 */

namespace CodeGenerator\Generator\Structure;

use CodeGenerator\Code\DynamicArrayGenerator;
use CodeGenerator\Generator\AbstractClassGenerator;
use CodeGenerator\Property\AbstractProperty;
use CodeGenerator\Property\PropertyFactory;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Db\Metadata\Object\ColumnObject;

class FieldsetGenerator extends AbstractClassGenerator
{

    const CONFIG_KEY = 'fieldset';

    /**
     * @return ClassGenerator
     */
    public function generate()
    {

        $class = parent::generate();

        $class->addUse($this->getFullClassName(EntityGenerator::CONFIG_KEY));
        $class->addUse($this->getFullClassName(AbstractFieldsetGenerator::CONFIG_KEY));
        $class->setExtendedClass( $this->getClassName( AbstractFieldsetGenerator::CONFIG_KEY));

        return $class;
    }

}