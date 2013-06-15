<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 26.05.13 22:51
 */

namespace CodeGenerator\Generator\Authentication;


use CodeGenerator\Generator\AbstractClassGenerator;

class ServiceGenerator extends AbstractClassGenerator {

    const CONFIG_KEY = 'authentication_service';

    public function generate() {
        $class = parent::generate();

        return $class;
    }

}