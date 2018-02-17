<?php

class Calc {
    static $num1 = '';
    static $num2 = '';
    static $action = '+';

    static function act() {
        if (!is_numeric(self::$num1) || !is_numeric(self::$num2)) {
            return 'Numbers were typed incorrectly';
        }

        switch (self::$action) {
            case '+':
                return self::$num1 + self::$num2;
            case '-':
                return self::$num1 - self::$num2;
            case '*':
                return self::$num1 * self::$num2;
            case '/':
                return (self::$num2 != 0 ? self::$num1 / self::$num2 : 'Can\'t divide by 0');
            default:
                return 'Operation was typed incorrectly';
        }
    }
}