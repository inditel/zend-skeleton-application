<?php
namespace Model\Fieldset\Generated;

use Inditel\Form\Fieldset;
use Model\Service\PaymentService;
use Model\Entity\PaymentEntity;

/**
 *
 */
class PaymentAbstractFieldset extends Fieldset
{

    public function __construct()
    {
        parent::__construct("PaymentAbstractFieldset");
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
            'datetime' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'datetime',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Datetime',
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
            'channel' => array(
                'type' => 'Zend\Form\Element\Select',
                'name' => 'channel',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Channel',
                    'option_values' => array(
                        '' => '',
                    ),
                ),
            ),
            'companyId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'companyId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Company id',
                ),
            ),
            'userJobId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'userJobId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'User job id',
                ),
            ),
            'packageId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'packageId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Package id',
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
            'datetime' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
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
            'channel' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(),
                'validators' => array(
                    new \Zend\Validator\InArray(array('haystack' => array(''))),
                ),
            ),
            'companyId' => array(
                'required' => true,
                'allowEmpty' => false,
                'filters' => array(),
                'validators' => array(
                    new \Zend\Validator\Digits(),
                    new \Zend\Validator\Between(array('min' => \CodeGenerator\Property\IntProperty::MIN_VALUE_UNSIGNED, 'max' => \CodeGenerator\Property\IntProperty::MAX_VALUE_UNSIGNED)),
                ),
            ),
            'userJobId' => array(
                'required' => true,
                'allowEmpty' => false,
                'filters' => array(),
                'validators' => array(
                    new \Zend\Validator\Digits(),
                    new \Zend\Validator\Between(array('min' => \CodeGenerator\Property\IntProperty::MIN_VALUE_SIGNED, 'max' => \CodeGenerator\Property\IntProperty::MAX_VALUE_SIGNED)),
                ),
            ),
            'packageId' => array(
                'required' => true,
                'allowEmpty' => false,
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
