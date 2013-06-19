<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 17:19
 */

namespace ErrorReporter;


class BotDetector implements BotDetectorInterface
{

    /**
     * @var array
     */
    private $botList;

    /**
     * @return string
     */
    public static function getClassName()
    {
        return get_called_class();
    }

    /**
     * @param array $config
     */
    public function initFromConfig(array $config)
    {
        if (isset($config['bot_list'])) {
            $this->setBotList($config['bot_list']);
        }
    }

    /**
     * @param string $userAgent
     * @return bool
     */
    public function isBot($userAgent = null)
    {
        if ($userAgent === null) {
            $userAgent = $this->getUserAgent();
        }

        foreach ((array)$this->getBotList() as $bot) {
            if (stripos($userAgent, $bot) !== false) {
                return true;
            };
        }
        return false;
    }

    /**
     * @return string|null
     */
    public function getUserAgent()
    {
        if (isset($_SERVER['HTTP_USER_AGENT'])) {
            return $_SERVER['HTTP_USER_AGENT'];
        }
        return null;
    }

    /**
     * @return array
     */
    public function getBotList()
    {
        return $this->botList;
    }

    /**
     * @param array $botList
     */
    public function setBotList(array $botList)
    {
        $this->botList = $botList;
    }
}