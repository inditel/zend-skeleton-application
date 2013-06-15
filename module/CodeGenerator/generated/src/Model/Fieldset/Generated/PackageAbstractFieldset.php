<?php
namespace Model\Fieldset\Generated;

use Inditel\Form\Fieldset;
use Model\Service\PackageService;
use Model\Entity\PackageEntity;

/**
 *
 */
class PackageAbstractFieldset extends Fieldset
{

    public function __construct()
    {
        parent::__construct("PackageAbstractFieldset");
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
            'price' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'price',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Price',
                ),
            ),
            'type' => array(
                'type' => 'Zend\Form\Element\Select',
                'name' => 'type',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Type',
                    'option_values' => array(
                        'company' => 'company',
                        'user' => 'user',
                    ),
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
            'timePeriodLength' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'timePeriodLength',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Time period length',
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
            'price' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
                ),
            ),
            'type' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(),
                'validators' => array(
                    new \Zend\Validator\InArray(array('haystack' => array('company', 'user'))),
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
            'timePeriodLength' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(),
                'validators' => array(
                    new \Zend\Validator\Digits(),
                    new \Zend\Validator\Between(array('min' => \CodeGenerator\Property\IntProperty::MIN_VALUE_SIGNED, 'max' => \CodeGenerator\Property\IntProperty::MAX_VALUE_SIGNED)),
                ),
            ),
        );

        return $validators;
    }


}
