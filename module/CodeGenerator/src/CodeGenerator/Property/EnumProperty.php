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

class EnumProperty extends AbstractProperty
{

    /**
     * @return array|string
     */
    public function getField()
    {
        $field = parent::getField();
        $field['type'] = 'Zend\Form\Element\Select';
        $field['options']['option_values'] = $this->getValues();
        return $field;
    }

    /**
     * @return array|string
     */
    public function getInputFilter()
    {
        $values = "'".implode("', '",$this->getValues())."'";

        $validator = parent::getInputFilter();
        $validator['validators'][] = function() use ($values) { return "new \Zend\Validator\InArray(array('haystack' => array(".$values.")))";};
        return $validator;
    }

    /**
     * @return array
     */
    private function getValues() {
        $values = array();
        foreach( $this->column->getErrata('permitted_values') as $value ) {
            $values[$value] = $value;
        }
        return $values;
    }
}