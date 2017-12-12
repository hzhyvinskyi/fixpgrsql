<?php

function summaryRanges($array)
{
    $result = [];

    if (empty($array)) {
        return $array;
    }

    $firstValue = $array[0];
    $firstIndex = 0;
    foreach ($array as $index => $value) {
        if ($index === 0) {
            continue;
        }
        $expectedValue = $array[$index - 1] + 1;
        if ($expectedValue !== $value) {
            if ($firstIndex !== $index - 1) {
                $result[] = "$firstValue->{$array[$index - 1]}";
            }
            $firstValue = $value;
            $firstIndex = $index;
        } elseif ($index === sizeof($array) - 1 && $expectedValue === $value) {
            $result[] = "$firstValue->{$array[$index]}";
        }
    }

    return $result;
  }
