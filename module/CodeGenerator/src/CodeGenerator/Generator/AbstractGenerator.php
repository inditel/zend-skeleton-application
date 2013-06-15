<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 27.05.13 18:27
 */

namespace CodeGenerator\Generator;

use Zend\Code\Generator\GeneratorInterface;

abstract class AbstractGenerator {

    /**
     * @var array
     */
    protected $config;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->setConfig( $config );
    }

    /**
     * @param string $configKey
     * @return GeneratorInterface
     */
    abstract public function generate();

    /**
     * @param array $config
     */
    public function setConfig( array $config ){
        $this->config = $config;
    }

    /**
     * @return array
     */
    public function getConfig() {
        return $this->config;
    }
}