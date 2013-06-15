<?php
namespace Model\Fieldset\Generated;

use Inditel\Form\Fieldset;
use Model\Service\CompanyService;
use Model\Entity\CompanyEntity;

/**
 *
 */
class CompanyAbstractFieldset extends Fieldset
{

    public function __construct()
    {
        parent::__construct("CompanyAbstractFieldset");
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
            'address' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'address',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Address',
                ),
            ),
            'registrationCode' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'registrationCode',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Registration code',
                ),
            ),
            'expires' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'expires',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Expires',
                ),
            ),
            'industry' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'industry',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Industry',
                ),
            ),
            'countryId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'countryId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Country id',
                ),
            ),
            'industryId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'industryId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Industry id',
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
                    new \Zend\Validator\Between(array('min' => \CodeGenerator\Property\IntProperty::MIN_VALUE_UNSIGNED, 'max' => \CodeGenerator\Property\IntProperty::MAX_VALUE_UNSIGNED)),
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
            'address' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
                ),
            ),
            'registrationCode' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
                ),
            ),
            'expires' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
                ),
            ),
            'industry' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
                ),
            ),
            'countryId' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(),
                'validators' => array(
                    new \Zend\Validator\Digits(),
                    new \Zend\Validator\Between(array('min' => \CodeGenerator\Property\IntProperty::MIN_VALUE_SIGNED, 'max' => \CodeGenerator\Property\IntProperty::MAX_VALUE_SIGNED)),
                ),
            ),
            'industryId' => array(
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
