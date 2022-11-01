<?php
$times = 0;

while ($times < 1) {
    $argument1 = read_operand('Enter fist number: ');
    $argument2 = read_operand('Enter second number: ');
    $sign = read_sign($argument2);

    $result = calculate($argument1, $argument2, $sign);

    info('Result: ' . $result);
}

function calculate($argument1, $argument2, $sign)
{
    switch($sign)
    {
        case '+':
            $result = $argument1 + $argument2;
            break;
        case '-':
            $result = $argument1 - $argument2;
            break;
        case '*':
            $result = $argument1 * $argument2;
            break;
        case '/':
            $result = $argument1 / $argument2;
    }

    return $result;
}

function info($result)
{
    echo $result . PHP_EOL;
}

function str_to_number($string)
{
    $isNegative = str_starts_with($string,'-');
    $string = str_replace(['+', '-'], null, $string);

    if ($isNegative) {
        $string = '-' . $string;
    }

    return (string) filter_var($string, FILTER_SANITIZE_NUMBER_INT);
}

function read_operand($message)
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

function read_sign($argument)
{
    do {
        $sign = readline('Enter sign: ');
        $isDataValid = in_array($sign, ['+', '-', '*', '/']);

        if (!$isDataValid) {
            info('Wrong sign.');

            continue;
        }

        $isDataValid = ($sign != '/' || $argument != 0);

        if (!$isDataValid) {
            info('Cant separate on zero.');
        }
    } while (!$isDataValid);

    return $sign;
}