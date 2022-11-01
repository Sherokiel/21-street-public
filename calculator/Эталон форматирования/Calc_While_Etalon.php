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

    $sign = readline('Enter sign: ');

    if ($argument1 !== $int1 || $argument2!== $int2) {
        info('Cant write letters.');

        continue;
    }

    if ($sign == '+') {
        $result = $argument1 + $argument2;
    } elseif ($sign == '-') {
        $result = $argument1 - $argument2;
    } elseif ($sign == '*') {
        $result = $argument1 * $argument2;
    } elseif ($sign == '/') {
        if ($argument2 == 0) {
            info('Cant separate on zero.');

            continue;
        }

        $result = $argument1 / $argument2;
    } else {
        info('Wrong sign.');

        continue;
    }

    info('Result: ' . $result);
}

function info($result)
{
    $resultEol=($result . PHP_EOL);
    echo $resultEol;

    return $resultEol;
}

function str_to_number($filter)
{
    return (string) filter_var($filter, FILTER_SANITIZE_NUMBER_INT);
}

Readline();