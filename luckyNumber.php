<?php

function lucky($num)
{
  if ($num == rand(1, 4)) {
    return "You are lucky!";
  } elseif ($num < 1 || $num > 4) {
    return "Unexpected number";
  } else {
    return "Sorry, you are not lucky. Try again!";
  }
}

echo lucky(2);
