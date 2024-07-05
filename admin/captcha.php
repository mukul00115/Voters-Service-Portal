<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Generate a random string for CAPTCHA
$captcha_text = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyz"), 0, 6);
$_SESSION['captcha'] = $captcha_text;

// Create a blank image
$captcha_image = imagecreatetruecolor(100, 30);

// Set colors
$background_color = imagecolorallocate($captcha_image, 255, 255, 255);
$text_color = imagecolorallocate($captcha_image, 0, 0, 0);

// Fill the background
imagefilledrectangle($captcha_image, 0, 0, 100, 30, $background_color);

// Add the text
$font_path = 'arial.ttf'; // Ensure you have the font file in the same directory or update the path accordingly
imagettftext($captcha_image, 14, 0, 10, 20, $text_color, $font_path, $captcha_text);

// Output the image
header('Content-Type: image/png');
imagepng($captcha_image);

// Free up resources
imagedestroy($captcha_image);
?>
