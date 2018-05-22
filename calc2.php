<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-Type:text/html; charset=utf-8');

function calc($num1, $num2, $action = '+') {
	if ($action == '+') {
		return $num1 + $num2;
	} elseif ($action == '-') {
		return $num1 - $num2;
	} elseif ($action == '*') {
		return $num1 * $num2;
	} elseif ($action == '/') {
		return ($num2 != 0) ? $num1 / $num2 : 'Ошибка, так как на 0 делить нельзя';
	} else {
		return 'Математическая операция введена некорректно';
	}
}

echo calc(7, 0, '/');
