<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 18:39
 */

namespace ErrorReporter\Reporter;


class OutputReporter implements ReporterInterface {

    /**
     * @param Exception[] $errors
     */
    public function report( array $errors ) {
        /** @var \Exception $error */
        foreach( $errors as $error ) {
            echo 'OutputReporter: '.$error->getMessage();
        }
    }
}