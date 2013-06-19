<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 12:27
 */

namespace CodeGenerator\Property;


use CodeGenerator\Filter\DbToPhpDataType;
use CodeGenerator\Filter\DbToPhpPropertyName;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Code\Generator\MethodGenerator;
use Zend\Code\Generator\ParameterGenerator;
use Zend\Code\Generator\PropertyGenerator;
use Zend\Db\Metadata\Object\ColumnObject;
use Zend\Text\Table\Table;

abstract class AbstractProperty
{

    /**
     * @var ColumnObject
     */
    protected $column;

    /**
     * @param ColumnObject $column
     */
    public function __construct(ColumnObject $column)
    {
        $this->column = $column;
    }

    /**
     * @return PropertyGenerator
     */
    public function getProperty()
    {

        $docBlock = new DocBlockGenerator();
        $docBlock->setTag(array(
            'name' => 'var',
            'description' => $this->getDataType() . ' $' . $this->getPropertyName(),
        ));

        $property = new PropertyGenerator();
        $property->setDocBlock($docBlock);
        $property->setName($this->getPropertyName());
        $property->setVisibility('protected');
        $property->setDefaultValue($this->column->getColumnDefault());

        return $property;
    }

    /**
     * Returns PHP data type for column
     *
     * @return string
     */
    public function getDataType()
    {
        $filter = new DbToPhpDataType();
        $type = $filter->filter($this->column->getDataType());
        return $type;
    }

    /**
     * Returns PHP property name for column
     *
     * @return string
     */
    public function getPropertyName()
    {
        $filter = new DbToPhpPropertyName();
        $name = $filter->filter($this->column->getName());
        return $name;
    }

    /**
     * @return array|string
     */
    public function getField()
    {
        return array(
            'type' => '',
            'name' => $this->column->getName(),
            'attributes' => array(),
            'options' => array(
                'label' => $this->getLabel(),
            ),
        );
    }

    /**
     * Returns element name that can be used as fieldset label.
     *
     * @return string
     */
    public function getLabel()
    {
        $filter = new \Zend\Filter\Word\CamelCaseToSeparator(' ');
        return ucfirst(strtolower($filter->filter($this->column->getName())));
    }

    /**
     * @return array|string
     */
    public function getInputFilter()
    {
        return array(
            'required' => $this->column->getIsNullable() ? false : true,
            'allowEmpty' => $this->column->getIsNullable() ? true : false,
            'filters' => array(),
            'validators' => array(),
        );
    }

    /**
     * @return MethodGenerator
     */
    public function getSetter()
    {

        $docBlock = new DocBlockGenerator();
        $docBlock->setTag(array(
            'name' => 'param',
            'description' => '' . $this->getDataType() . ' $' . $this->getPropertyName(),
        ));

        $parameter = new ParameterGenerator();
        $parameter->setName($this->getPropertyName());
        $parameter->setType($this->getDataType());

        $method = new MethodGenerator();
        $method->setName('set' . ucfirst($this->getPropertyName()));
        $method->setDocBlock($docBlock);
        $method->setParameter($parameter);
        $method->setBody('$this->' . $this->getPropertyName() . ' = $' . $this->getPropertyName() . ';');

        return $method;
    }

    /**
     * @return MethodGenerator
     */
    public function getGetter()
    {
        $docBlock = new DocBlockGenerator();
        $docBlock->setTag(array(
            'name' => 'return',
            'description' => $this->getDataType(),
        ));

        //$parameter = new ParameterGenerator();
        //$parameter->setName($this->getPropertyName());
        //$parameter->setType($this->getDataType());

        $method = new MethodGenerator();
        $method->setName('get' . ucfirst($this->getPropertyName()));
        $method->setDocBlock($docBlock);
        //$method->setParameter($parameter);
        //$method->setBody('$this->' . $this->getPropertyName() . ' = $' . $this->getPropertyName() . ';');
        $method->setBody('return $this->' . $this->getPropertyName() . ';');

        return $method;
    }

}