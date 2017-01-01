<?php

require('./classes/TextMeasure.php');

$text = isset($_GET['text']) ? $_GET['text'] : 'Hello World!';
$size = isset($_GET['size']) ? $_GET['size'] : 200;
$font_path = './fonts/raidercrusader.ttf';

// Get a precise measure of the text
$text_measure = new TextMeasure($text, $font_path, $size);
$measure = $text_measure->measureText();

// use the measure to create a correct text rendering
$gd_image = imagecreatetruecolor($measure['width'], $measure['height']);
$black = imagecolorallocate($gd_image, 0, 0, 0);
imagefill($gd_image, 0, 0, $black);
$red = imagecolorallocate($gd_image, 255, 0, 0);
imagettftext($gd_image, $size, 0, $measure['x'], $measure['y'], $red, $font_path, $text);

header('Content-type: image/png');
imagepng($gd_image);
