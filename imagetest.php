<?php
//header('Content-Type: image/jpeg');
$path = "/share/1682494497.61/output.jpg";
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
echo '<img src="' . $base64 . '">';
echo '<img src="' . $base64 . '">';
?>

