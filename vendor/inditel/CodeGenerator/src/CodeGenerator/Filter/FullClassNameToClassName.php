<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 12:35
 */

namespace CodeGenerator\Filter;


use Zend\Filter\AbstractFilter;
use Zend\Filter\Exception;

class FullClassNameToClassName extends AbstractFilter {

    /**
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     * @throws Exception\RuntimeException If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
        return array_pop(explode('\\', $value));
    }
}