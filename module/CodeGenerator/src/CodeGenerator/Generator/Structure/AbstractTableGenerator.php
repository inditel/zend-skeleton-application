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

class AbstractTableGenerator extends AbstractClassGenerator
{

    const CONFIG_KEY = 'abstract_table';

    /**
     * @return ClassGenerator
     */
    public function generate()
    {

        $class = parent::generate();

        $this->addConstructor($class);
        $this->addMap($class);

        return $class;
    }

    public function addConstructor(ClassGenerator $class)
    {

        $class->addUse('Zend\Db\Adapter\Adapter');
        $class->addUse($this->getFullClassName(EntityGenerator::CONFIG_KEY));

        $adapter = new ParameterGenerator('adapter', '\Zend\Db\Adapter\Adapter', null, 1);

        $method = new MethodGenerator();
        $method->setName('__construct');
        $method->setParameter($adapter);
        $method->setBody('parent::__construct($adapter, \''.$this->table->getName().'\', new ' . $this->getClassName(EntityGenerator::CONFIG_KEY) . '());');

        $class->addMethodFromGenerator($method);
    }

    public function addMap(ClassGenerator $class)
    {

        $propertyFactory = new PropertyFactory();
        $data = array();
        foreach ($this->table->getColumns() as $column) {
            /* @var $column ColumnObject */
            $property = $propertyFactory->create($column);
            /* @var $property AbstractProperty */
            $data[$column->getName()] = $property->getPropertyName();
        }

        $method = new MethodGenerator();
        $method->setName('getMetadataMapping');
        $method->setBody('return ' . var_export($data, true) . ';');

        $class->addMethodFromGenerator($method);
    }

}