<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 17:51
 */

namespace ErrorReporter\Reporter;


class EmailReporter implements ReporterInterface {

    /**
     * @var array
     */
    private $from;
    /**
     * @var array
     */
    private $to;
    /**
     * @var string
     */
    private $template;

    /**
     * @var Transport
     */
    private $transporter;
    /**
     * @var Zend\View\Renderer\PhpRenderer
     */
    private $phpRenderer;

    /**
     * @param Exception[] $errors
     */
    public function report( array $errors ) {
        // @TODO Send error email
    }
}