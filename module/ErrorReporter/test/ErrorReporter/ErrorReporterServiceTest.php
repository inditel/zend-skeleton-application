<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 15:56
 */

namespace ErrorReporter\Service;


class ErrorReporterServiceTest extends \PHPUnit_Framework_TestCase
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
        $this->reporter = new ErrorReporterService();
        $this->reporterMock = $this->getMock('ErrorReporter\Service\ErrorReporterService', array('addPhpError'));
    }

    public function test_initFromConfig()
    {
        $this->setupDefaultConfigForErrorReporter();
        $this->assertEquals(E_ALL - E_NOTICE, $this->reporter->getPhpErrorTypes());
    }

    public function setupDefaultConfigForErrorReporter($reporter = null)
    {
        if ($reporter == null) {
            $reporter = $this->reporter;
        }
        $config = array(
            'error_types' => E_ALL - E_NOTICE,
            'bot_list' => array(
                'bot',
                'second'
            ),
        );
        $reporter->initFromConfig($config);
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

    public function test_addLastError() {


        $this->reporterMock->expects($this->exactly(2))->method('addPhpError')->with($this->equalTo(E_USER_NOTICE));
        $this->reporterMock->setPhpErrorTypes(E_ALL);
        $this->reporterMock->registerPhpErrorHandler();
        @trigger_error('Custom error 2', E_USER_NOTICE);
        $this->reporterMock->addLastError();
    }

    public function test_registerShutdownHandler() {
        // @FIXME No idea how to test that.
    }

    public function test_fatalError() {
        // @FIXME Test invalid method call. No idea how to test it.
        //$obj->myMethod();

        // @FIXME test parse error. No idea how to test it.
    }


}
