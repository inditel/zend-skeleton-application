<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 13:32
 */

namespace CodeGenerator\Property;


use CodeGenerator\Code\DynamicArrayGenerator;
use Zend\Code\Generator\BodyGenerator;
use Zend\Code\Generator\PropertyGenerator;

class TextProperty extends AbstractProperty
{

    const MAX_LENGTH = 65536;
    /**
     * @return array|string
     */
    public function getField()
    {
        $field = parent::getField();
        $field['type'] = 'Zend\Form\Element\Text';
        return $field;
    }

    /**
     * @return array|string
     */
    public function getInputFilter()
    {
        $validator = parent::getInputFilter();
        $validator['filters'][] = function() { return "new \Zend\Filter\StringTrim()";};
        $validator['validators'][] = function() { return "new \Zend\Validator\StringLength(array('max' => \CodeGenerator\Property\TextProperty::MAX_LENGTH))";};
        return $validator;
    }
}