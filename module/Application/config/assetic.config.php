<?php
$yuiCompressorJarPath = './vendor/yuicompressor/yuicompressor-2.4.7.jar';
$javaPath = 'C:\Program Files\Java\jre7\bin\java.exe';
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
                            /*'CssCompressorFilter' => array(
                                'name' => 'Assetic\Filter\Yui\CssCompressorFilter',
                                'option' => array($yuiCompressorJarPath, $javaPath),
                            ),*/
                        ),
                    ),

                    'base_js' => array(
                        'assets' => array(
                            'js/*.js',
                        ),
                        'filters' => array(
                            /*'JsCompressorFilter' => array(
                                'name' => 'Assetic\Filter\Yui\JsCompressorFilter',
                                'option' => array($yuiCompressorJarPath, $javaPath),
                            ),*/
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