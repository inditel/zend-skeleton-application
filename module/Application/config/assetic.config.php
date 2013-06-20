<?php
return array(
    'assetic_configuration' => array(

        'default' => array(
            'assets' => array(
                '@base_css',
                '@base_js',
            ),
            'options' => array(
                'mixin' => true
            ),
        ),

        'modules' => array(
            'application' => array(
                'root_path' => __DIR__ . '/../assets',
                'collections' => array(

                    'base_css' => array(
                        'assets' => array(
                            'css/*.css',
                        ),
                        'filters' => array(
                            'CssRewriteFilter' => array(
                                'name' => 'Assetic\Filter\CssRewriteFilter'
                            ),
                        ),
                    ),

                    'base_js' => array(
                        'assets' => array(
                            'js/*.js',
                        ),
                    ),

                    'base_images' => array(
                        'assets' => array(
                            'img/*.png',
                            'img/*.ico',
                        ),
                        'options' => array(
                            'move_raw' => true,
                        )
                    ),
                ),
            ),
        )
    )
);