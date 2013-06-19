<?php
$path = __DIR__.'/../../../src/ErrorReporter/';
require($path.'ErrorReporter.php');
require($path.'Reporter\ReporterInterface.php');
require($path.'Reporter\OutputReporter.php');

$e = new \ErrorReporter\ErrorReporter();
$e->addReporter( new \ErrorReporter\Reporter\OutputReporter() );
$e->registerPhpErrorHandler();
$e->registerShutdownHandler();
$e->report();

$xx = null;
$xx->xx();