<?php
return array (
	'error_reporter' => array (
        // if http 404 error should be reported
		'report_404' => true,

        // if http 404 error should be reported if page is accessed by a bot
		'report_bot_404' => true,

        // PHP error types that will be catched and reported
        'error_types' => E_ALL & ~E_STRICT,

        // Service name for reporters that should be used.
        // Safer reporters should be last, as if for example email reporter fails, next one will report email reporter failure too.
        'reporters' => array(
            // ErrorReporter\DbReporter
            // ErrorReporter\EmailReporter
            // ErrorReporter\LoggerReporter
        ),
	),
    'bot_detector' => array(
        'bots_list' => require('bots.config.php'),
    ),
    'error_reporter_email' => array(
        'template' => 'error/mail',
        'error_email' => array(
            'from' => array('email' => '', 'name' => ''),
            'subject' => '[Errors] '.(isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'Unknown server')),
        ),
        'to' => array(
            array('email' => '', 'name' => '', ),
        ),
        'transporter' => '',
    ),
    'error_reporter_db' => array(
        'adapter' => 'Zend\Db\Adapter\Adapter',
        'table' => '',
    ),
    'error_reporter_logger' => array(
        'logger' => 'LoggerService',
    ),
	'service_manager' => array (
		'invokables' => array (
            'ErrorReporter' => 'ErrorReporter\ErrorReporterService',
		),
	),
	'view_manager' => array (
		'template_path_stack' => array (
			__DIR__ . '/../view'
		),
	),
);


