<?php
$times = array();
$sum = 0;
$noOfTests = 25;
for ($i = 0; $i < $noOfTests; $i++) {
    $start = microtime(true);
    file_get_contents('http://' . $_SERVER['HTTP_HOST'] . '/' . dirname($_SERVER['REQUEST_URI']));
    $taken = microtime(true) - $start;
    $times[] = $taken;
    $sum += $taken;
}

echo '<pre>';
echo 'Average: '.round($sum/$noOfTests,6)."\n";
echo 'Data: '."\n";
echo print_r($times);
echo '</pre>';