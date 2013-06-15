<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 14:37
 */

namespace CodeGenerator\Writer;


use Zend\Code\Generator\ClassGenerator;

class ClassWriter extends AbstractWriter {

    /**
     * @var ClassGenerator
     */
    private $class;

    /**
     * @var array
     */
    private $config;

    public function __construct( ClassGenerator $class, array $config ) {
        $this->class = $class;
        $this->config = $config;
    }

    public function write() {

        $source = $this->class->generate();
        $path = $this->getFullName();
        $this->createPath( $path );
        file_put_contents( $path, '<?php'."\n".$source );

    }

    public function getFileName() {
        return $this->class->getName().'.php';
    }

    public function getFilePath() {
        return $this->config['path'] . DIRECTORY_SEPARATOR . $this->config['src_dir'] . DIRECTORY_SEPARATOR .  $this->class->getNamespaceName();
    }

}