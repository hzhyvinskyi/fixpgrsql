<?php

function uniq(array $ar)
{
  $res = [];

  for ($i = 0; $i < sizeof($ar); $i++) {
    if (in_array($ar[$i], $res)) {
      continue;
    }

    $res[] = $ar[$i];
  }

  return $res;
}

print_r(uniq([4, 1, 5, 8, 1, 3, 5, 4]));
