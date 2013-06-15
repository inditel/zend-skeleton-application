<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 25.05.13 14:37
 */

namespace CodeGenerator\Writer;


abstract class AbstractWriter {

    abstract public function write();

    abstract public function getFilePath();

    abstract public function getFileName();

    public function getFullName() {
        return $this->getFilePath(). DIRECTORY_SEPARATOR . $this->getFileName();
    }

    public function createPath( $path ) {

        $path = str_replace('\\', DIRECTORY_SEPARATOR, $path);
        $path = str_replace('/', DIRECTORY_SEPARATOR, $path);
        $path = dirname( $path );

        $path = explode(DIRECTORY_SEPARATOR, $path);
        $root = '';
        foreach ($path as $part) {
            $root .= $part . DIRECTORY_SEPARATOR;
            if (!is_dir($root)) {
                mkdir($root);
            }
        }
    }
}