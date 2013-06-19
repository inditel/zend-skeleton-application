<?php
return array(
    'error_reporter' => array(
        // if http 404 error should be reported
        'report_404' => true,

        // if http 404 error should be reported if page is accessed by a bot
        'report_bot_404' => true,

        // PHP error types that will be catched and reported
        'error_types' => E_ALL,

        // Service name for reporters that should be used.
        // Safer reporters should be last, as if for example email reporter fails, next one will report email reporter failure too.
        'reporters' => array( // ErrorReporter\DbReporter
            // ErrorReporter\EmailReporter
            // ErrorReporter\LoggerReporter
        ),
    ),

    'bot_detector' => array(
        'bots_list' => require('bots.config.php'),
    ),

    'error_reporter_email' => array(

        // template that will be used for HTML email
        'template' => 'error/mail',

        // email subject
        'subject' => '[Errors] ' . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'Unknown server')),

        // email from part
        'from' => array('email' => '', 'name' => ''),

        // send emails to
        'to' => array(
            array('email' => '', 'name' => '',),
        ),

        // Transport that will be used to send emails.
        'transporter' => 'Zend\Mail\Transport\Sendmail',
    ),

    'error_reporter_db' => array(
        'table_gateway' => 'error_reporter_table',
    ),

    'error_reporter_logger' => array(
        // Logger service that will be used for logging
        'logger' => 'Zend\Log\Logger',
    ),

    'service_manager' => array(
        'invokables' => array(
            'ErrorReporter' => 'ErrorReporter\ErrorReporterService',
            'Zend\Mail\Transport\Sendmail' => 'Zend\Mail\Transport\Sendmail',
            'Zend\Log\Logger' => 'Zend\Log\Logger',
            'error_reporter_table' => function (\Zend\ServiceManager\ServiceLocatorInterface $sm) {
                return new \Zend\Db\TableGateway\TableGateway('error_table', $sm->get('Zend\Db\Adapter\Adapter'));
            }
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view'
        ),
    ),
);


