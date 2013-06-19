<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 12:35
 */

namespace CodeGenerator\Filter;


use Zend\Filter\Exception;
use Zend\Filter\Word\UnderscoreToCamelCase;

class TableNameToClassName extends UnderscoreToCamelCase {

    /**
     * @var string
     */
    private $suffix = '';

    /**
     * @var string
     */
    private $prefix = '';

    /**
     * @param string $sufix
     */
    public function __construct( $options ) {
        parent::__construct();
        $this->suffix = (string)$options['suffix'];
        $this->prefix = (string)$options['prefix'];
    }

    /**
     * Returns the result of filtering $value
     *
     * @param  mixed $value
     * @throws Exception\RuntimeException If filtering $value is impossible
     * @return mixed
     */
    public function filter($value)
    {
        return $this->prefix . ucfirst(parent::filter( $value )) . $this->suffix;
    }
}