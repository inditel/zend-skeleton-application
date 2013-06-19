<?php
$path = __DIR__.'/../../../src/ErrorReporter/';
require($path.'ErrorReporter.php');
require($path.'Reporter\ReporterInterface.php');
require($path . 'Reporter\EchoReporter.php');

$e = new \ErrorReporter\ErrorReporter();
$e->addReporter( new \ErrorReporter\Reporter\EchoReporter() );
$e->registerPhpErrorHandler();
$e->registerShutdownHandler();
$e->report();

$xx = null;
$xx->xx();