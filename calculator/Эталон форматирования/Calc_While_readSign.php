<?php
$times = 0;

while ($times < 1) {
    $argument1 = read_Operand('Enter fist number: ');
    $argument2 = read_Operand('Enter second number: ');
    $sign=read_Sign($argument2);

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

function read_Operand($message)
{
    do {
        $argument = readline($message);
        $int1 = str_to_number($argument);
        $isDataValid = ($argument == $int1);

        if (!$isDataValid) {
            info('Cant write letters.');

            continue;
        }

        $isDataValid = ($argument != null);

        if (!$isDataValid) {
            info('Cant write space.');
        }
    } while (!$isDataValid);

    return $argument;
}

function read_Sign($argument)
{
    do {
        $sign = readline('Enter sign: ');
        $isDataValid = ($sign == '+' || $sign == '-' || $sign == '*' || $sign == '/');

        if (!$isDataValid) {
            info('Wrong sign.');

            continue;
        }

        $isDataValid = ($sign != '/' || $argument != 0);

        if (!$isDataValid) {
            info('Cant separate on zero.');
        }
    } while(!$isDataValid);

    return $sign;
}
