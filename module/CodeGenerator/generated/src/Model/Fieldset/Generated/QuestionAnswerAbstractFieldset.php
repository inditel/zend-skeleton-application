<?php
namespace Model\Fieldset\Generated;

use Inditel\Form\Fieldset;
use Model\Service\QuestionAnswerService;
use Model\Entity\QuestionAnswerEntity;

/**
 *
 */
class QuestionAnswerAbstractFieldset extends Fieldset
{

    public function __construct()
    {
        parent::__construct("QuestionAnswerAbstractFieldset");
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
            'testQuestionId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'testQuestionId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Test question id',
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
            'answer' => array(
                'type' => 'Zend\Form\Element\Text',
                'name' => 'answer',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Answer',
                ),
            ),
            'testAnswerId' => array(
                'type' => 'Zend\Form\Element\Number',
                'name' => 'testAnswerId',
                'attributes' => array(),
                'options' => array(
                    'label' => 'Test answer id',
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
            'testQuestionId' => array(
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
            'answer' => array(
                'required' => false,
                'allowEmpty' => true,
                'filters' => array(
                    new \Zend\Filter\StringTrim(),
                ),
                'validators' => array(
                    new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH)),
                ),
            ),
            'testAnswerId' => array(
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
