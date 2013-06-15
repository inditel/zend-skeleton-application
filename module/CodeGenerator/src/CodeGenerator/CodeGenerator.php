<?php
use Zend\Db\Metadata\Object\TableObject;

/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 12:26
 */

namespace CodeGenerator;


use CodeGenerator\Generator\AbstractGenerator;
use CodeGenerator\Writer\ClassWriter;
use Zend\Code\Generator\ClassGenerator;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Metadata\Metadata;
use Zend\Db\Metadata\Object\TableObject;

class CodeGenerator
{

    /**
     * @var Adapter
     */
    private $adapter;
    /**
     * @var Array
     */
    private $config;

    public function __construct(Adapter $adapter, array $config)
    {
        $this->adapter = $adapter;
        $this->config = $config['code_generator'];
    }

    public function generate()
    {

        $metadata = new Metadata($this->adapter);
        foreach ($metadata->getTables() as $table) {
            /* @var TableObject $table */
            foreach ($this->config['generators'] as $generator) {
                $strategy = new $generator($table, $this->config);
                /* @var AbstractGenerator $strategy */
                $writer = new ClassWriter($strategy->generate(), $this->config);
                $writer->write();
            }
        }

    }

    public function deleteAllGenerated()
    {
        $path = $this->config['path'];
        if (substr($path, -9, 9) == 'generated') {
            $this->recursiveDelete($path . DIRECTORY_SEPARATOR);
        }
    }

    private function recursiveDelete($dir)
    {

        $files = glob($dir . '*', GLOB_MARK);
        foreach ($files as $file) {
            if (is_dir($file)) {
                $this->recursiveDelete($file);
            } else {
                unlink($file);

            }
            @rmdir($dir);
        }
    }

}