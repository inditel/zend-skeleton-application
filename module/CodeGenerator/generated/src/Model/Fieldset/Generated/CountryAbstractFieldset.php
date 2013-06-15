<?php
namespace Model\Fieldset\Generated;

use Inditel\Form\Fieldset;
use Model\Service\CountryService;
use Model\Entity\CountryEntity;

/**
 *
 */
class CountryAbstractFieldset extends Fieldset
{

    public function __construct()
    {
        parent::__construct("CountryAbstractFieldset");
    }

    public function getElementsSpecification()
    {
        $elements = array(
            'id' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'id',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Id',
                ),
            ),
            'name' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'name',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Name',
                ),
            ),
            'key' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'key',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Key',
                ),
            ),
        );

        return $elements;
    }

    public function getInputFilterSpecification()
    {
        $validators = array(
            'id' => array(
                'required' => true,
                'allowEmpty' => false,
                'filters' => array(),
                'validators' => array(
                    new \Zend\Validator\Digits(),
                    new \Zend\Validator\Between(array('min' => \CodeGenerator\Property\IntProperty::MIN_VALUE_SIGNED, 'max' => \CodeGenerator\Property\IntProperty::MAX_VALUE_SIGNED)),
                ),
            ),
            'name' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
                ),
            ),
            'key' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
                ),
            ),
        );

        return $validators;
    }


}
