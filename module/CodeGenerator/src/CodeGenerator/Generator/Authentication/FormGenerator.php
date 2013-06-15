<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 26.05.13 22:51
 */

namespace CodeGenerator\Generator\Authentication;


use CodeGenerator\Generator\AbstractClassGenerator;

class FormGenerator extends AbstractClassGenerator {

    const CONFIG_KEY = 'authentication_form';

    public function generate() {
        $class = parent::generate();

        return $class;
    }

}