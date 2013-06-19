<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 18:58
 */

namespace ErrorReporter;


class ErrorReporterFactoryTest extends \PHPUnit_Framework_TestCase
{

    public function test_createService()
    {

        $config = array(
            'error_reporter' => array(
                'x' => 1,
                'reporters' => array(
                    'reporter1',
                    'reporter2',
                ),
            )
        );

        $realReporter1 = $this->getMockForAbstractClass('ErrorReporter\Reporter\ReporterInterface');
        $realReporter2 = $this->getMockForAbstractClass('ErrorReporter\Reporter\ReporterInterface');

        $reporter = $this->getMock('ErrorReporter\ErrorReporter', array('initFromConfig', 'setBotDetector', 'registerPhpErrorHandler', 'registerShutdownHandler'));
        $reporter->expects($this->once())->method('setBotDetector')->with($this->equalTo(null));
        $reporter->expects($this->once())->method('registerPhpErrorHandler');
        $reporter->expects($this->once())->method('registerShutdownHandler');
        $reporter->expects($this->once())->method('initFromConfig')->with($config['error_reporter']);

        $factory = $this->getMock('ErrorReporter\ErrorReporterFactory', array('getNewErrorReporter'));
        $factory->expects($this->once())->method('getNewErrorReporter')->will($this->returnValue($reporter));

        $locator = $this->getMockForAbstractClass('Zend\ServiceManager\ServiceLocatorInterface', array('get'));
        $locator->expects($this->exactly(4))->method('get')
            ->with($this->logicalOr($this->equalTo('Config'), $this->equalTo('BotDetector'), $this->equalTo('reporter1'), $this->equalTo('reporter2')))
            ->will($this->returnCallback(function ($arg) use ($config,$realReporter1,$realReporter2) {
                if ($arg == 'Config') {
                    return $config;
                } else if( $arg == 'reporter1' ) {
                    return $realReporter1;
                } else if( $arg == 'reporter2' ) {
                    return $realReporter2;
                }
                return null;
            }));

        $service = $factory->createService($locator);
        $this->assertEquals(array($realReporter1,$realReporter2), $service->getReporters());
    }

    public function testGetNewErrorReporter() {
        $f = new ErrorReporterFactory();
        $this->assertInstanceOf('ErrorReporter\ErrorReporter', $f->getNewErrorReporter() );
    }
}
