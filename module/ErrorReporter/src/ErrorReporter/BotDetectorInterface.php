<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 18:08
 */

namespace ErrorReporter;


interface BotDetectorInterface {

    /**
     * @return boolean
     */
    public function isBot();
}