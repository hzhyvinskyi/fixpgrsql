<?php

function smallestDivisor($num)
{
    $smd = function($num, $acc) use (&$smd)
    {
        if ($num <= $acc) {
            return $num;
        }

        if ($num % $acc == 0) {
            return $acc;
        }

        return $smd($num, $acc + 1);
    };

    return $smd($num, 2);
}

echo smallestDivisor(11);
