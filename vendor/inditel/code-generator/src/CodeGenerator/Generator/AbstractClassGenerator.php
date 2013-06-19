<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 13:19
 */

namespace CodeGenerator\Generator;

use CodeGenerator\Filter\FullClassNameToClassName;
use CodeGenerator\Filter\TableNameToClassName;
use Zend\Code\Generator\ClassGenerator;
use Zend\Code\Generator\DocBlockGenerator;
use Zend\Db\Metadata\Object\TableObject;

class AbstractClassGenerator extends AbstractGenerator
{

    const CONFIG_KEY = null;
    /**
     * @var TableObject
     */
    protected $table;

    /**
     *
     * Config parameters
     * @configkey string $type_key[extends]
     * @configkey string $type_key[name_suffix]
     * @configkey string $type_key[name_prefix]
     * @configkey string $type_key[namespace]
     *
     * @param TableObject $table
     * @param array $config
     */
    public function __construct(TableObject $table, array $config)
    {
        parent::__construct($config);
        $this->table = $table;
    }

    /**
     * @return ClassGenerator
     */
    public function generate()
    {

        $class = new ClassGenerator();
        $class->setName($this->getClassName());
        $class->setNamespaceName($this->config[static::CONFIG_KEY]['namespace']);

        $docBlock = new DocBlockGenerator();
        $class->setDocBlock($docBlock);

        if (isset($this->config[static::CONFIG_KEY]['extends']) && $this->config[static::CONFIG_KEY]['extends']) {
            $filter = new FullClassNameToClassName();
            $extends = $filter->filter($this->config[static::CONFIG_KEY]['extends']);
            $class->setExtendedClass($extends);
            $class->addUse($this->config[static::CONFIG_KEY]['extends']);
        }

        return $class;
    }

    /**
     * @return string
     */
    public function getClassName($configKey = null)
    {
        if ($configKey == null) {
            $configKey = static::CONFIG_KEY;
        }
        $classNameFilter = new TableNameToClassName(array(
            'suffix' => $this->config[$configKey]['name_suffix'],
            'prefix' => $this->config[$configKey]['name_prefix'],
        ));

        return $classNameFilter->filter($this->table->getName());
    }

    /**
     * @return string
     */
    public function getFullClassName($configKey = null)
    {
        if ($configKey == null) {
            $configKey = static::CONFIG_KEY;
        }
        return $this->config[$configKey]['namespace'] . '\\' . $this->getClassName($configKey);
    }

}