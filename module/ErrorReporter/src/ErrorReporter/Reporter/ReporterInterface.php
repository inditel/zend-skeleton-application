<?php
/**
 * Created by Inditel Meedia OÜ
 * User: Oliver
 * Date: 19.06.13 17:41
 */

namespace ErrorReporter\Reporter;


interface ReporterInterface {

    /**
     * @param Exception[] $errors
     */
    public function report( array $errors );

}