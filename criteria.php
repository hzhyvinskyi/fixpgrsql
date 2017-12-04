<?php

function criteriaGreaterThan($min)
{
  return function ($item) use ($min) {
    return $item > $min;
  };
}

$input = [1, 2, 3, 4, 5, 6];

// Use array_filter on input with a selected filter function
$output = array_filter($input, criteriaGreaterThan(3));

print_r($output);
