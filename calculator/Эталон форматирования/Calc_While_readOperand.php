<?php
$times = 0;

while ($times < 1) {

    $argument1 = readOperand('Enter fist number: ');
    $argument2 = readOperand('Enter second number: ');

    do {
        $sign = readline('Enter sign: ');

        if ($sign !== '+' && $sign !== '-' && $sign !== '*' && $sign !== '/') {
            info('Wrong sign.');

            continue;
        }

        if ($sign == "/" && $argument2 == 0) {
            info('Cant separate on zero.');
        }
    } While($sign !== '+' && $sign !== '-' && $sign !== '*' && $sign !== '/' || $sign == "/" && $argument2 == 0 );

    $result = calculate($argument1, $argument2, $sign);

    info('Result: ' . $result);
}

function calculate($argument1, $argument2, $sign)
{
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

function readOperand($message)
{
    do {
        $isDataValid = true;
        $argument = readline($message);
        $int1 = str_to_number($argument);
        $isDataValid &= ($argument == $int1);

        if (!$isDataValid) {
            info('Cant write letters.');

            continue;
        }

        $isDataValid &= ($argument != null);
        if (!$isDataValid) {
            info('Cant write space.');
        }
    } while (!$isDataValid);

    return $argument;
}
