<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 18:39
 */

namespace ErrorReporter\Reporter;


class DbReporter implements ReporterInterface {

    /**
     * @var Zend\Db\Adapter\Adapter
     */
    private $adapter;
    /**
     * @var string
     */
    private $table;

    /**
     * @param Exception[] $errors
     */
    public function report( array $errors ) {
        // @TODO Send error email
    }
}