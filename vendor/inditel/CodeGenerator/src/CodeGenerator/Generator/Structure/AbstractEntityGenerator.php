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
use Zend\Db\Metadata\Object\ColumnObject;

class AbstractEntityGenerator extends AbstractClassGenerator
{

    const CONFIG_KEY = 'abstract_entity';

    /**
     * @return ClassGenerator
     */
    public function generate()
    {

        $class = parent::generate();

        $propertyFactory = new PropertyFactory();
        foreach ($this->table->getColumns() as $column) {
            /* @var $column ColumnObject */
            $property = $propertyFactory->create($column);
            /* @var $property AbstractProperty */
            $class->addPropertyFromGenerator($property->getProperty());
            $class->addMethodFromGenerator($property->getSetter());
            $class->addMethodFromGenerator($property->getGetter());
        }

        return $class;
    }

}