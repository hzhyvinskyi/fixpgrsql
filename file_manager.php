<?php

error_reporting(-1);
ini_set('display_errors', 'on');
header('Content-type: text/html; charset=utf-8');

if (isset($_GET['link'])) {
    $ar = scandir($_GET['link']);
} else {
    $ar = scandir('.');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <?php
    foreach ($ar as $v) {
		if (is_dir(isset($_GET['link']) ? $_GET['link'].$v : $v)){
			echo '<img src="https://winzoro.net/uploads/iconsets/the-moonlight/folder2.png" alt="directory" width="20">';
			echo '<a href="?link='.(isset($_GET['link']) ? $_GET['link'].$v.'/' : $v.'/').'">'.$v.'</a><br>';
		} else {
			echo '<img src="https://winzoro.net/uploads/iconsets/the-moonlight/txt.png" alt="file" width="20">';
			echo $v.'<br>';
		}
    }
    ?>
</body>
</html>
