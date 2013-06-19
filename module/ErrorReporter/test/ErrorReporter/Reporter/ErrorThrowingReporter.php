<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 18:48
 */

namespace ErrorReporter\Reporter;


class ErrorThrowingReporter implements ReporterInterface{

    public function report(array $errors) {
        throw new \Exception('REPORTER_EXCEPTION');
    }
}