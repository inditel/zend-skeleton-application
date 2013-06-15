<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 13:32
 */

namespace CodeGenerator\Property;


use Zend\Code\Generator\PropertyGenerator;

class IntProperty extends AbstractProperty
{

    const MIN_VALUE_UNSIGNED = 0;
    const MIN_VALUE_SIGNED = -8388608;
    const MAX_VALUE_UNSIGNED = 16777215;
    const MAX_VALUE_SIGNED = 8388607;

    /**
     * @return array|string
     */
    public function getField()
    {

        $field = parent::getField();
        $field['type'] = 'Zend\Form\Element\Number';
        return $field;
    }

    /**
     * @return array|string
     */
    public function getInputFilter()
    {

        if ($this->column->getNumericUnsigned() ) {
            $min = '\CodeGenerator\Property\IntProperty::MIN_VALUE_UNSIGNED';
            $max = '\CodeGenerator\Property\IntProperty::MAX_VALUE_UNSIGNED';
        } else {
            $min = '\CodeGenerator\Property\IntProperty::MIN_VALUE_SIGNED';
            $max = '\CodeGenerator\Property\IntProperty::MAX_VALUE_SIGNED';
        }

        $validator = parent::getInputFilter();
        $validator['validators'][] = function() { return 'new \Zend\Validator\Digits()';};
        $validator['validators'][] = function() use ($min, $max) { return "new \Zend\Validator\Between(array('min' => " . $min . ", 'max' => " . $max . "))"; };
        return $validator;
    }
}