<?php

$times = 0;

while ($times < 1) {
    $command = choose('Enter command ', ['+', '-', '*', '/', 'exit']);

    if ($command == 'exit') {
        $command = choose('Are you sure to wanna quit? Yes/No ', ['yes', 'no']);

        if ($command == 'yes') {
            exit();
        }

        continue;
    }

    $argument1 = read_operand('Enter fist number: ', $command);
    $argument2 = read_operand('Enter second number: ', $command, true);

    $result = calculate($argument1, $argument2, $command);

    info('Result: ' . $result);

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

function read_operand($message, $command, $isSecondOperand = false)
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

        if ($isSecondOperand){
            $isDataValid = ($command != '/' || $argument != 0);

            if (!$isDataValid) {
                info('Cant separate on zero.');
            }
        }

    } while (!$isDataValid);

    return $argument;
}

function choose($message, $availableValues)
{
    do {
        $availableValuesString = implode(', ', $availableValues);
        $command = readline($message . '(' . 'Available commands: ' . $availableValuesString . '): ');
        $command = strtolower($command);
        $isDataValid = in_array($command, $availableValues);


        if (!$isDataValid) {
            info('Wrong enter, enter one of this commands: ' . $availableValuesString);
        }
    } while(!$isDataValid);

    return $command;
}