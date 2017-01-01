# GD precise text size measurement

This code aims to provide a simple way to get a precise GD text size and position by building upon the `imagettfbbox` function.

To use this library, include the `TextMeasure` class and write something like this:
````
$text_measure = new TextMeasure($text, $font_path, $size);
$measure = $text_measure->measureText();
````

The `measureText` method will return an array with this structure
````
array (size=4)
  'x' => int -6
  'y' => int 188
  'width' => int 440
  'height' => int 188
````

You can then use this array to create your text like this:
````
$gd_image = imagecreatetruecolor($measure['width'], $measure['height']);
imagettftext($gd_image, $size, 0, $measure['x'], $measure['y'], $red, $font_path, $text);
````

Here's a preview of the resulting image:  
![](/img/preview.png?raw=true)
