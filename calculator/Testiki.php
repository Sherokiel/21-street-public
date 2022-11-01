<?php

$times = 0;
$save = [];
while ($times < 1) {

$argument1 = readline();
$argument2 = readline();

$result = $argument1 + $argument2;
echo ('Result: ' . $result . PHP_EOL);




array_push($save, "{$argument1} + {$argument2}  =  {$result}");
foreach ($save as $value)
echo($value) . PHP_EOL;
$s = implode(''.PHP_EOL, $save);

file_put_contents('save.txt', $s, FILE_APPEND);


}

