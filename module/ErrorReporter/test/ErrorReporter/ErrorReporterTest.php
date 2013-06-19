<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 15:56
 */

namespace ErrorReporter;


use ErrorReporter\Exception\RouterNoMatchException;
use ErrorReporter\Reporter\ErrorThrowingReporter;

class ErrorReporterTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var ErrorReporterService
     */
    private $reporter;
    /**
     * @var ErrorReporterService
     */
    private $reporterMock;

    public function setUp()
    {
        $this->reporter = new ErrorReporter();
        $this->reporterMock = $this->getMock(ErrorReporter::getClassName(), array('addPhpError', 'report'));
    }

    public function tearDown() {
        restore_error_handler();
    }

    public function test_initFromConfig()
    {
        $this->setupDefaultConfigForErrorReporter();
        $this->assertEquals(E_ALL - E_NOTICE, $this->reporter->getPhpErrorTypes());
        $this->assertTrue($this->reporter->getReportBot404());
        $this->assertTrue($this->reporter->getReport404());
    }

    private function setupDefaultConfigForErrorReporter($reporter = null)
    {
        if ($reporter == null) {
            $reporter = $this->reporter;
        }
        $config = array(
            'error_types' => E_ALL - E_NOTICE,
            'report_bot_404' => true,
            'report_404' => true,
        );
        $reporter->initFromConfig($config);
    }

    public function test_defaultPropertyValues()
    {
        $this->assertNull($this->reporter->getPhpErrorTypes());
        $this->assertNull($this->reporter->getReportBot404());
        $this->assertNull($this->reporter->getReport404());
    }

    public function test_setPhpErrorTypes()
    {
        $this->assertEquals(null, $this->reporter->getPhpErrorTypes());
        $this->reporter->setPhpErrorTypes(E_USER_NOTICE);
        $this->assertEquals(E_USER_NOTICE, $this->reporter->getPhpErrorTypes());
    }

    public function test_registerPhpErrorHandler_onlySetErrorTypesReported()
    {
        $this->reporterMock->expects($this->never())->method('addPhpError');
        $this->reporterMock->setPhpErrorTypes(E_NOTICE);
        $this->reporterMock->registerPhpErrorHandler();
        @trigger_error('Custom error', E_USER_NOTICE);
    }

    public function test_registerPhpErrorHandler_phpErrorsAreAdded()
    {
        $this->reporterMock->expects($this->once())->method('addPhpError')->with($this->equalTo(E_USER_NOTICE));
        $this->reporterMock->setPhpErrorTypes(E_ALL);
        $this->reporterMock->registerPhpErrorHandler();
        @trigger_error('Custom error 2', E_USER_NOTICE);
    }

    public function test_addPhpError()
    {
        $this->reporter->addPhpError(E_USER_NOTICE, 'test', 'file', 10);

        $errors = $this->reporter->getErrors();
        /** @var \ErrorException $exception */
        $exception = $errors[0];
        $this->assertEquals(1, count($errors));
        $this->assertInstanceOf('\ErrorException', $exception);
        $this->assertEquals(E_USER_NOTICE, $exception->getCode());
        $this->assertEquals('file', $exception->getFile());
        $this->assertEquals(10, $exception->getLine());
        $this->assertEquals('test', $exception->getMessage());
        $this->assertEquals(1, $exception->getSeverity());
    }

    public function test_addException()
    {
        $this->reporter->addException(new \RuntimeException('message', 12));

        $errors = $this->reporter->getErrors();
        /** @var \RuntimeException $exception */
        $exception = $errors[0];
        $this->assertEquals(1, count($errors));
        $this->assertInstanceOf('\RuntimeException', $exception);
        $this->assertEquals('message', $exception->getMessage());
        $this->assertEquals(12, $exception->getCode());
    }

    public function test_addLastErrorAndReport()
    {
        $this->reporterMock->expects($this->exactly(2))->method('addPhpError')->with($this->equalTo(E_USER_NOTICE));
        $this->reporterMock->expects($this->once())->method('report');
        $this->reporterMock->setPhpErrorTypes(E_ALL);
        $this->reporterMock->registerPhpErrorHandler();
        @trigger_error('Custom error 2', E_USER_NOTICE);
        $this->reporterMock->addLastErrorAndReport();
    }

    public function test_fatalError()
    {
        echo '-------------------------------------------------------' . "\n";
        echo '** NB! IGNORE PREVIOUS ERROR. IT IS FATAL ERROR TEST **' . "\n";
        echo '-------------------------------------------------------' . "\n";
        echo "\n";


        exec('php ' . __DIR__ . '/Reporter/fatalTester.php', $output, $returnValue);
        $result = (string)implode("\n", $output);
        $this->assertContains('EchoReporter: Call to a member function xx() on a non-object', $result);
    }

    public function test_registerShutdownHandler()
    {
        $this->reporter->registerShutdownHandler();
        // @TODO How to test it?
    }

    public function test_report()
    {
        $reporter = $this->getMockForAbstractClass('ErrorReporter\Reporter\ReporterInterface', array('report'));
        $reporter->expects($this->once())->method('report');

        $reporter2 = $this->getMockForAbstractClass('ErrorReporter\Reporter\ReporterInterface', array('report'));
        $reporter2->expects($this->once())->method('report');

        $this->reporter->addReporter($reporter);
        $this->reporter->addReporter($reporter2);
        $this->reporter->addException(new \Exception('test'));
        $this->reporter->report();

        $this->assertEquals(0, count($this->reporter->getErrors()));
    }

    public function test_report_firstReporterCausedExceptionAndNextReporterShouldReportThatToo()
    {
        require(__DIR__ . '/Reporter/ErrorThrowingReporter.php');
        $exceptionReporter = new ErrorThrowingReporter();

        $reporter = $this->getMockForAbstractClass('ErrorReporter\Reporter\ReporterInterface', array('report'));
        $reporter->expects($this->once())->method('report')->with(array(new \Exception('test'), new \Exception('REPORTER_EXCEPTION')));

        $this->reporter->addReporter($exceptionReporter);
        $this->reporter->addReporter($reporter);
        $this->reporter->addException(new \Exception('test'));
        $this->reporter->report();
    }

    public function test_report_dontReport404Errors()
    {
        $reporter = $this->getMockForAbstractClass('ErrorReporter\Reporter\ReporterInterface', array('report'));
        $reporter->expects($this->never())->method('report');

        $reporter2 = $this->getMockForAbstractClass('ErrorReporter\Reporter\ReporterInterface', array('report'));
        $reporter2->expects($this->never())->method('report');

        $this->reporter->addReporter($reporter);
        $this->reporter->addReporter($reporter2);
        $this->reporter->setReport404(false);
        $this->reporter->addException(new RouterNoMatchException('test'));
        $this->reporter->report();
    }

    /**
     * @exceptedExceptio \ErrorReporter\Exception\BotDetectorServiceNotSetException
     */
    public function test_shouldReportNoReporter()
    {
        $this->reporter->setReportBot404(true);
        $this->reporter->addPhpError(1, 2, 3, 4);

        $this->reporter->shouldReport();
    }

    public function test_isBot404Exception()
    {
        $this->setupBotDetector();
        $this->reporter->getBotDetector()->expects($this->exactly(2))->method('isBot')->will($this->onConsecutiveCalls(false, true));

        $this->reporter->setReportBot404(true);
        $this->assertFalse($this->reporter->isBot404Exception(new RouterNoMatchException()));
        $this->assertTrue($this->reporter->isBot404Exception(new RouterNoMatchException()));
    }

    private function setupBotDetector()
    {
        $botDetector = $this->getMock(BotDetector::getClassName(), array('isBot'));
        $this->reporter->setBotDetector($botDetector);
        $this->reporterMock->setBotDetector($botDetector);
    }

    public function test_shouldReportException_404()
    {

        $this->reporter->setReport404(false);
        $this->assertFalse($this->reporter->shouldReportException(new RouterNoMatchException()));
        $this->assertTrue($this->reporter->shouldReportException(new \Exception()));
    }

    public function test_shouldReportException_bot404()
    {
        $this->setupBotDetector();
        $this->reporter->getBotDetector()->expects($this->exactly(2))->method('isBot')->will($this->onConsecutiveCalls(false, true));

        $this->reporter->setReport404(true);

        $this->reporter->setReportBot404(false);
        $this->assertTrue($this->reporter->shouldReportException(new RouterNoMatchException()));
        $this->assertFalse($this->reporter->shouldReportException(new RouterNoMatchException()));

        $this->reporter->setReportBot404(true);
        $this->assertTrue($this->reporter->shouldReportException(new RouterNoMatchException()));
        $this->assertTrue($this->reporter->shouldReportException(new RouterNoMatchException()));
    }

    public function test_shouldReport()
    {
        $this->reporter->addException(new \Exception());
        $this->assertTrue($this->reporter->shouldReport());
    }

    public function test_shouldReport_ignore()
    {
        $this->reporter->addException(new RouterNoMatchException());
        $this->reporter->setReport404(false);
        $this->assertFalse($this->reporter->shouldReport());
    }


}
