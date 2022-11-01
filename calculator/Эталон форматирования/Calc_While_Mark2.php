<?php
$times = 0;

while ($times < 1) {
    $argument1 = readline('Enter first number: ');
    $int1 = str_to_number($argument1);

    if ($argument1 != $int1) {
        info('Cant write letters.');

        continue;
    }

    if ($argument1 == null) {
        info('Cant write space.');

        continue;
    }

    $argument2 = readline('Enter second number: ');
    $int2 = str_to_number($argument2);

    if ($argument2 != $int2) {
        info('Cant write letters.');

        continue;
    }

    if ($argument2 == null) {
        info('Cant write space.');

        continue;
    }

    $sign = readline('Enter sign: ');

    if($sign !== '+' && $sign !== '-' && $sign !== '*' && $sign !== '/') {
        info('Wrong sign.');

        continue;
    }

    if ($sign == "/"&&$argument2 == 0) {
        info('Cant separate on zero.');

        continue;
    }

    $result = calculate($argument1, $argument2, $sign);
    
    info('Result: ' . $result);
}

function calculate($argument1, $argument2, $sign){
    if ($sign == '+') {
        $result = $argument1 + $argument2;
    } elseif ($sign == '-') {
        $result = $argument1 - $argument2;
    } elseif ($sign == '*') {
        $result = $argument1 * $argument2;
    } elseif ($sign == '/') {
        $result = $argument1 / $argument2;
    }

    return $result;
}

function info($result)
{
    echo ($result . PHP_EOL);
}

function str_to_number($filter)
{
    return (string) filter_var($filter, FILTER_SANITIZE_NUMBER_INT);
}