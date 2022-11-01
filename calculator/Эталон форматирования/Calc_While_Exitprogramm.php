<?php

$times = 0;

while ($times < 1) {
    $command = read_command();

    if ($command == 'exit'||$command == 'Exit') {
        exitprogramm();

        continue;
    }

    $argument1 = read_operand('Enter fist number: ', $command, 1);
    $argument2 = read_operand('Enter second number: ', $command, 2);

    $result = calculate($argument1, $argument2, $command);

    info('Result: ' . $result);

}

function exitprogramm()
{
    $exit = readline('Are you sure to wanna quit?: ');
    if (in_array($exit, ['y','yes'])) {

        exit();
    }
}

function calculate($argument1, $argument2, $command)
{
    switch ($command)
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

function read_operand($message, $command, $i)
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

            continue;
        }
        if ($i == 2){
            $isDataValid = ($command != '/' || $argument != 0);

            if (!$isDataValid) {
                info('Cant separate on zero.');
            }
        }

    } while (!$isDataValid);

    return $argument;
}

function read_command()
{
    do {
        $command = readline('Enter command: ');
        $isDataValid = in_array($command, ['+', '-', '*', '/', 'exit', 'Exit']);

        if (!$isDataValid) {
            info('Wrong command.');
        }
    } while (!$isDataValid);

    return $command;
}