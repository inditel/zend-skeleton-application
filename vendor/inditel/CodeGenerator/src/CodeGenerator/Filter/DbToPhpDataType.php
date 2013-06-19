<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 12:35
 */

namespace CodeGenerator\Filter;


use Zend\Filter\AbstractFilter;
use Zend\Filter\Exception;

class DbToPhpDataType extends AbstractFilter {

    private static $map = array(
        'text' => 'string',
        'longtext' => 'string',
        'char' => 'string',
        'varchar' => 'string',

        'tinyint' => 'int',
        'smallint' => 'int',
        'mediumint' => 'int',
        'int' => 'int',
        'bigint' => 'int',

        'boolean' => 'boolean',

        'double' => 'double',
        'float' => 'float',

        'enum' => 'string',
        'set' => 'array',

        'date' => 'string',
        'datetime' => 'string',
        'timestamp' => 'string',
        'time' => 'string',
    );

    /**
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     * @throws Exception\RuntimeException If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
        $value = strtolower($value);

        if( !isset(self::$map[$value]) ) {
            throw new \RuntimeException('Don\'t know how to filter '.$value.' to PHP data type!');
        }

        return self::$map[$value];
    }
}