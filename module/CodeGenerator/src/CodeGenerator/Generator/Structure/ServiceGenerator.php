<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 13:50
 */

namespace CodeGenerator\Generator\Structure;

use CodeGenerator\Generator\AbstractClassGenerator;
use CodeGenerator\Property\AbstractProperty;
use CodeGenerator\Property\PropertyFactory;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\ParameterGenerator;
use Zend\Db\Metadata\Object\ColumnObject;

class ServiceGenerator extends AbstractClassGenerator{

    const CONFIG_KEY = 'service';

    /**
     * @return ClassGenerator
     */
    public function generate() {

        $class = parent::generate();

        $class->addUse( $this->getFullClassName( TableGenerator::CONFIG_KEY) );
        $class->addUse( $this->getFullClassName( EntityGenerator::CONFIG_KEY) );

        return $class;
    }

}