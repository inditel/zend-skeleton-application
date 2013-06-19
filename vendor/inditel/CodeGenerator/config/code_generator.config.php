<?php
return array(
    'path' => 'data/tmp/generated',
    'src_dir' => 'src',
    'view_dir' => 'view',

    'generators' => array(
        'CodeGenerator\Generator\Structure\AbstractEntityGenerator',
        'CodeGenerator\Generator\Structure\AbstractFieldsetGenerator',
        'CodeGenerator\Generator\Structure\AbstractTableGenerator',
        'CodeGenerator\Generator\Structure\ControllerGenerator',
        'CodeGenerator\Generator\Structure\EntityGenerator',
        'CodeGenerator\Generator\Structure\FieldsetGenerator',
        'CodeGenerator\Generator\Structure\FormGenerator',
        'CodeGenerator\Generator\Structure\ServiceGenerator',
        'CodeGenerator\Generator\Structure\TableGenerator',
    ),

    'abstract_table' => array(
        'namespace' => 'Model\\Table\\Generated',
        'extends' => '\Inditel\Db\TableGateway\AbstractTableGateway',
        'name_suffix' => 'AbstractTable',
        'name_prefix' => '',
    ),

    'table' => array(
        'namespace' => 'Model\\Table',
        'name_suffix' => 'Table',
        'name_prefix' => '',
    ),

    'abstract_entity' => array(
        'namespace' => 'Model\\Entity\\Generated',
        'extends' => '\Inditel\Db\Entity\AbstractEntity',
        'name_suffix' => 'AbstractEntity',
        'name_prefix' => '',
    ),

    'entity' => array(
        'namespace' => 'Model\\Entity',
        'name_suffix' => 'Entity',
        'name_prefix' => '',
    ),

    'controller' => array(
        'namespace' => 'Application\\Controller',
        'extends' => 'Inditel\Mvc\Controller\AbstractActionController',
        'name_suffix' => 'Controller',
        'name_prefix' => '',
    ),

    'abstract_fieldset' => array(
        'namespace' => 'Model\\Fieldset\\Generated',
        'extends' => 'Inditel\Form\Fieldset',
        'name_suffix' => 'AbstractFieldset',
        'name_prefix' => '',
    ),

    'fieldset' => array(
        'namespace' => 'Model\\Fieldset',
        'name_suffix' => 'Fieldset',
        'name_prefix' => '',
    ),

    'form' => array(
        'namespace' => 'Application\\Form',
        'extends' => 'Inditel\Form\Form',
        'name_suffix' => 'Form',
        'name_prefix' => '',
    ),

    'service' => array(
        'namespace' => 'Model\\Service',
        'extends' => 'Inditel\Service\Service',
        'name_suffix' => 'Service',
        'name_prefix' => '',
    ),

);
