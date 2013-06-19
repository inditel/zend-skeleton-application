<?php
/**
 * Created by Inditel Meedia OÜ
 * login: Oliver
 * Date: 23.05.13 11:49
 */

namespace CodeGenerator\Form;


use Zend\Db\Adapter\Adapter;
use Zend\Form\Form;
use Zend\Stdlib\ArrayObject;

class GenerateForm extends Form
{

    public function __construct(Adapter $adapter)
    {
        parent::__construct(__CLASS__);

        $this->add(array(
           'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Generate',

            ),

        ));

    }

}