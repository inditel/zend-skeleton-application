<?php
return array (
	'error_reporter' => array (
		'template' => 'error/mail',
		'ignore_404' => false,
		'ignore_bot_404' => false,

        'sub_templates' => array(
            /*
            array(
                'template' => 'error/custom',
                'closure' => function( ServiceLocatorInterface $sm ) {
                    return array(
                        'custom' => '2222',
                    );
                },
            ),
            */
        ),

        'error_email' => array(
            'from_email' => '',
            'from_name' => '',
            'subject' => '[Errors] '.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'Unknown server')),
        ),
        'send_email_report_to' => array(
            /*
            array(
                'email' => '',
                'name' => '',
            ),
            */
        ),

		'bot_list' => array (
			'AhrefsBot', 
			'bingbot', 
			'Ezooms', 
			'Googlebot', 
			'Mail.RU_Bot', 
			'YandexBot',
		),
	),

	'service_manager' => array (
		'invokables' => array (
            'ErrorReporter' => 'ErrorReporter\Service\ErrorReporterService',
            'ErrorSender' => 'ErrorReporter\Service\ErrorSenderService',
		),
	),
	'view_manager' => array (
		'template_path_stack' => array (
			__DIR__ . '/../view'
		),
	),
);


