<?php
error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-type: text/html; charset=utf-8');

echo '<table border="1" cellpadding="20">';
for ($y = 1; $y <= 3; ++$y) {
    if ($y == 3) {
        echo '<tr style="background-color:red">';
    } else {
        echo '<tr>';
    }

    for ($x = 1; $x <= 5; ++$x) {
        $color = '';
        if ($x == 2 && $y == 1) {
            $color = 'yellow';
        } elseif (($x == 3 || $x == 4) && $y == 2 ) {
            $color = 'green';
        }

        echo '<td style="background-color:'.$color.'">'.$x.'.'.$y.'</td>';
    }

    echo '</tr>';
}

echo '</table>';
