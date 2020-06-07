<!-- 
***************************************************************************************
*    ADAPTED FROM
*    Title: <PHP: Protecting forms using a CAPTCHA>
*    Author: <The Art Of Web>
*    Date: <Feb 3, 2007> Article first posted, Unknown if updated since
*    Date Accessed: <May 25, 2020>
*    Code version: <Unknown>
*    Availability: <https://www.the-art-of-web.com/php/captcha/>
*
***************************************************************************************
-->

<?php
//--------RENDER CAPTCHA BACKGROUND

$image = imagecreatetruecolor(250, 80) or die("Cannot Initialize new GD image stream");
 
// set background to white and allocate drawing colours
$background = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
imagefill($image, 0, 0, $background);
$linecolor = imagecolorallocate($image, 0xCC, 0xCC, 0xCC);
$textcolor = imagecolorallocate($image, 0x33, 0x33, 0x33);

// draw random lines on canvas
for($i=0; $i < 6; $i++) {
  imagesetthickness($image, rand(1,3));
  imageline($image, 0, rand(0,80), 250, rand(0,80), $linecolor);
}

session_start();

// add random digits to canvas
$digit = '';
for($x = 15; $x <= 95; $x += 20) {
  $digit .= ($num = rand(0, 9));
  imagechar($image, rand(3, 5), $x, rand(2, 60), $num, $textcolor);
}

// record digits in session variable
$_SESSION['digit'] = $digit;
 
header('Content-type: image/png');
imagepng($image);
imagedestroy($image);

?>