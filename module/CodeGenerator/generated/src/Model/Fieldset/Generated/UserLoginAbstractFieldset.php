<?php
namespace Model\Fieldset\Generated;

use Inditel\Form\Fieldset;
use Model\Service\UserLoginService;
use Model\Entity\UserLoginEntity;

/**
 *
 */
class UserLoginAbstractFieldset extends Fieldset
{

    public function __construct()
    {
        parent::__construct("UserLoginAbstractFieldset");
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
            'type' => array(
                'type' => 'Zend\Form\Element\Select',
                'name' => 'type',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Type',
                    'option_values' => array(
                        'email' => 'email',
                        'linkedin' => 'linkedin',
                    ),
                ),
            ),
            'login' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'login',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Login',
                ),
            ),
            'userId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'userId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'User id',
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
            'type' => array(
                'required' => true,
                'allowEmpty' => false,
                'filters' => array(),
                'validators' => array(
                    new \Zend\Validator\InArray(array('haystack' => array('email', 'linkedin'))),
                ),
            ),
            'login' => array(
                'required' => true,
                'allowEmpty' => false,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
                ),
            ),
            'userId' => array(
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
