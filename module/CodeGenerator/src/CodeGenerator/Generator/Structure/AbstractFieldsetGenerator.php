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

class AbstractFieldsetGenerator extends AbstractClassGenerator
{

    const CONFIG_KEY = 'abstract_fieldset';

    /**
     * @return ClassGenerator
     */
    public function generate()
    {

        $class = parent::generate();

        $class->addUse($this->getFullClassName(ServiceGenerator::CONFIG_KEY));
        $class->addUse($this->getFullClassName(EntityGenerator::CONFIG_KEY));

        $this->addConstructor($class);
        $this->addElements($class);
        $this->addInputFilters($class);

        return $class;
    }

    public function addConstructor(ClassGenerator $class)
    {

        $method = new MethodGenerator();
        $method->setName('__construct');
        $method->setBody('parent::__construct("' . $this->getClassName() . '");');

        $class->addMethodFromGenerator($method);
    }

    public function addElements(ClassGenerator $class)
    {

        $propertyFactory = new PropertyFactory();
        $elementsCode = '';
        $elements = array();
        foreach ($this->table->getColumns() as $column) {

            /* @var $column ColumnObject */
            $property = $propertyFactory->create($column);
            /* @var $property AbstractProperty */
            $element = $property->getField();

            if (is_array($element)) {
                $elements[$property->getPropertyName()] = $element;

            } else if (is_string($element)) {
                $elementsCode .= $element . "\n";
                $elementsCode .= "\$elements['" . $property->getPropertyName() . "'] = \$element;\n\n";
            }

        }

        $body = "\$elements = ";

        $gen = new DynamicArrayGenerator();
        $gen->setContent($elements);
        $body .= $gen->generate() . ";\n\n";

        $body .= $elementsCode;

        $body .= "return \$elements;";

        $method = new MethodGenerator();
        $method->setName('getElementsSpecification');
        $method->setBody($body);

        $class->addMethodFromGenerator($method);
    }

    public function addInputFilters(ClassGenerator $class)
    {
        $propertyFactory = new PropertyFactory();

        $validatorsCode = '';
        $validators = array();
        foreach ($this->table->getColumns() as $column) {

            /* @var $column ColumnObject */
            $property = $propertyFactory->create($column);
            /* @var $property AbstractProperty */
            $filter = $property->getInputFilter();

            if (is_array($filter)) {
                $validators[$property->getPropertyName()] = $filter;

            } else if (is_string($filter)) {
                $validatorsCode .= $filter . "\n";
                $validatorsCode .= "\$validators['" . $property->getPropertyName() . "'] = \$validator;\n\n";
            }
        }


        $body = "\$validators = ";

        $gen = new DynamicArrayGenerator();
        $gen->setContent($validators);
        $body .= $gen->generate() . ";\n\n";

        $body .= $validatorsCode;

        $body .= "return \$validators;";

        $method = new MethodGenerator();
        $method->setName('getInputFilterSpecification');
        $method->setBody($body);

        $class->addMethodFromGenerator($method);
    }

}