<?php
exec('php composer.phar dump-autoload --optimize', $result );
echo "\t".implode("\n\t",$result);