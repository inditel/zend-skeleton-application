<?php
return array(
    'doctrine' => array(
        'driver' => array(
            'my_annotation_driver' => array(
                'class' => 'Doctrine\ORM\Mapping\Driver\AnnotationDriver',
                'cache' => 'filesystem',

                'paths' => array(
                    __DIR__ . '/../src/Application/Entity/',
                ),
            ),
            'orm_default' => array(
                'drivers' => array(
                    'Application\Entity' => 'my_annotation_driver'
                )
            ),
        ),
        'configuration' => array(
            'orm_default' => array(
                'metadata_cache' => 'array',
                'query_cache' => 'array',
                'result_cache' => 'array',
            ),
        ),
    )
);