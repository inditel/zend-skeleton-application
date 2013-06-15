<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 12:35
 */

namespace CodeGenerator\Filter;


use Zend\Filter\Exception;
use Zend\Filter\Word\UnderscoreToCamelCase;

class DbToPhpPropertyName extends UnderscoreToCamelCase
{

    /**
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     * @throws Exception\RuntimeException If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
        return lcfirst(parent::filter($value));
    }
}