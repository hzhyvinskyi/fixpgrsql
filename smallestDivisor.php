<?php

function smallestDivisor($num)
{
    $sdiv = function($num, $acc) use (&$sdiv)
    {
        if ($num <= $acc) {
            return $num;
        }

        if ($num % $acc == 0) {
            return $acc;
        }

        return $sdiv($num, $acc + 1);
    };

    return $sdiv($num, 2);
}
