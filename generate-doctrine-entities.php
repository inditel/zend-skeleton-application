<?php
echo '<pre>'."\n";
$mod = 'vendor/doctrine/doctrine-module/bin/doctrine-module';
$list = array(
    array(
        'namespace' => 'Application\Entity',
        'path' => './module/Application/src/',
    ),
);


foreach ($list as $row) {
    echo '----------------------------------' . "\n";
    echo 'GENERATE FOR ' . $row['namespace'] . "\n\n";
    echo 'Generate mappings' . "\n";
    $command = 'php ' . $mod . ' orm:convert-mapping --namespace="' . $row['namespace'] . '\\\\" --force --from-database annotation ' . $row['path'] . '';
    echo "\t".$command . "\n\n";
    $result = array();
    exec($command, $result);
    echo "\t".implode("\n\t",$result);
    unset($result);
    echo "\n\n\n";

    echo 'Generate entities' . "\n";
    $command = 'php ' . $mod . ' orm:generate-entities ' . $row['path'] . ' --generate-annotations=true';
    echo "\t".$command . "\n\n";
    $result = array();
    exec($command, $result);
    echo "\t".implode("\n\t",$result);
    unset($result);

    echo "\n\n";
}

echo '<pre>'."\n";