<?php

function lucky($num)
{
  if ($num == rand(1, 3)) {
    return "You are lucky!";
  } elseif ($num < 1 || $num > 3) {
    return "Unexpected number";
  } else {
    return "Sorry, you are not lucky. Try again!";
  }
}

echo lucky(3);
