<?php
namespace Model\Fieldset\Generated;

use Inditel\Form\Fieldset;
use Model\Service\TestHasTestQuestionService;
use Model\Entity\TestHasTestQuestionEntity;

/**
 *
 */
class TestHasTestQuestionAbstractFieldset extends Fieldset
{

    public function __construct()
    {
        parent::__construct("TestHasTestQuestionAbstractFieldset");
    }

    public function getElementsSpecification()
    {
        $elements = array(
            'testId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'testId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Test id',
                ),
            ),
            'testQuestionId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'testQuestionId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Test question id',
                ),
            ),
        );

        return $elements;
    }

    public function getInputFilterSpecification()
    {
        $validators = array(
            'testId' => array(
                'required' => true,
                'allowEmpty' => false,
                'filters' => array(),
                'validators' => array(
                    new \Zend\Validator\Digits(),
                    new \Zend\Validator\Between(array('min' => \CodeGenerator\Property\IntProperty::MIN_VALUE_SIGNED, 'max' => \CodeGenerator\Property\IntProperty::MAX_VALUE_SIGNED)),
                ),
            ),
            'testQuestionId' => array(
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
