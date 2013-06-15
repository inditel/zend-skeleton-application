<?php
return array(
    'code_generator' => require('code_generator.config.php'),
    'router' => array(
        'routes' => array(
            'generate_model' => array(
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => array(
                    'route' => '/generate_model',
                    'defaults' => array(
                        'controller' => 'CodeGenerator\Controller\IndexController',
                        'action' => 'generate',
                    ),
                ),
            ),
        ),
    ),
    'di' => array(
        'allowed_controllers' => array(
            'CodeGenerator\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);
