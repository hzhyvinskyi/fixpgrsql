<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-type: text/html; charset=utf-8');

function calc($num1, $num2, $action = '+') {
    if (!is_numeric($num1) || !is_numeric($num2)) {
        return 'Entered data are not numeric';
    }

    switch ($action) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        case '/':
            return (($num2 != 0) ? $num1 / $num2 : 'Can\'t divide by 0');
        default:
            return 'Operation entered incorrectly';
    }
}

echo calc(10, 3, '/');
