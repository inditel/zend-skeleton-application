<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 16:15
 */

namespace CodeGenerator\Code;


use Zend\Code\Generator\BodyGenerator;

class DynamicArrayGenerator extends BodyGenerator
{

    public function setContent(array $data)
    {
        $this->content = $this->phpStringBuilder($data, '');
    }

    public function phpStringBuilder(array $data, $indent)
    {
        $string = 'array(';
        if ($data) {
            $string .= "\n";
            foreach ($data as $key => $value) {
                $string .= $this->indentation . $indent;
                if( !is_int($key) ) {
                    $string .= "'" . $key . "' => ";
                }
                $string .= $this->valueBuilder($value, $indent) . ",\n";
            }
            $string .= $indent;
        }
        $string .= ")";
        return $string;
    }

    public function valueBuilder($value, $indent)
    {
        if (is_array($value)) {
            return $this->phpStringBuilder($value, $indent . $this->indentation);

        } else if (is_string($value)) {
            return "'" . $this->cleanValue($value) . "'";

        } else if (is_numeric($value)) {
            return $value;

        } else if( $value instanceof \Closure ) {
            return $value();

        } else if( $value === null ) {
            return 'null';

        } else if( $value === true ) {
            return 'true';

        } else if( $value === false ) {
            return 'false';

        } else {
            throw new \RuntimeException('Can\'t parse php string from array! Invalid input! ('.gettype($value).')');
        }
    }

    public function cleanValue($value)
    {
        $value = str_replace(array("'"), array("\'"), $value);
        return $value;
    }
}