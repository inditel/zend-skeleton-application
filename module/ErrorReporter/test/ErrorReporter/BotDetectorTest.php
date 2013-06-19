<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 17:20
 */

namespace ErrorReporter;


class BotDetectorTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var BotDetector
     */
    private $detector;
    /**
     * @var BotDetector
     */
    private $mockDetector;

    public function setUp()
    {
        $this->detector = new BotDetector();
        $this->mockDetector = $this->getMock(BotDetector::getClassName(), array('getUserAgent'));
    }

    public function test_initFromConfig()
    {
        $this->setupDefaultConfig();
        $bots = $this->detector->getBotList();
        $this->assertEquals(2, count($bots));
        $this->assertEquals('google', $bots[0]);
        $this->assertEquals('bing', $bots[1]);
    }

    private function setupDefaultConfig()
    {
        $config = array(
            'bot_list' => array(
                'google', 'bing'
            ),
        );
        $this->detector->initFromConfig($config);
        $this->mockDetector->initFromConfig($config);
    }

    public function test_getUserAgent()
    {
        $this->assertEquals(@$_SERVER['HTTP_USER_AGENT'], $this->detector->getUserAgent());

        $prev = @$_SERVER['HTTP_USER_AGENT'];
        $_SERVER['HTTP_USER_AGENT'] = 'xxx';
        $this->assertEquals('xxx', $this->detector->getUserAgent());
        $_SERVER['HTTP_USER_AGENT'] = $prev;
    }

    public function test_isBot()
    {
        $this->setupDefaultConfig();
        $this->assertFalse($this->detector->isBot());
        $this->assertFalse($this->detector->isBot('chrome'));
        $this->assertTrue($this->detector->isBot('googlebot'));
        $this->assertTrue($this->detector->isBot('gOOglebot'));
        $this->assertTrue($this->detector->isBot('bing'));

        $this->mockDetector->expects($this->exactly(2))->method('getUserAgent')->will($this->onConsecutiveCalls('google', 'chrome'));
        $this->assertTrue($this->mockDetector->isBot()); // google
        $this->assertfalse($this->mockDetector->isBot()); // chrome
    }
}
