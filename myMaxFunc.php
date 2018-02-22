<?php

function myMax(array $arr)
{
  if (empty($arr)) {
    return;
  }

  $max = $arr[0];

  foreach ($arr as $value) {
    if ($max < $value) {
      $max = $value;
    }
  }

  return $max;
}

$ar1 = [1, 2, 5, 7, 10, 12, 25, 18, 43, 9, 77];

print_r(myMax($ar1));
