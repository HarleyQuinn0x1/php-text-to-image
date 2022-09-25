<?php
// (A) SETTINGS
if (empty($_GET['user'])) {
    exit;
} else {

    //Get Text from url
    $txt = $_GET['user'];
    
    $font = "Add FONT HERE .ttf files";
    $font_size = 35;
    $font_angle = 0;
    $width = 300;
    $height = 300;

   // Create Image With Give Color
    $img = imagecreate($width, $height);
    $color = imagecolorallocate($img, 74, 4, 202);
    $black = imagecolorallocate($img, 0, 0, 0);
    imagefilledrectangle($img, 0, 0, $width, $height, $color);

    // Get Text Box Size
    // imagettfbbox(FONT SIZE, ANGLE, FONT, TEXT)
    $text_size = imagettfbbox($font_size, $font_angle, $font, $txt);
    $text_width = max([$text_size[2], $text_size[4]]) - min([$text_size[0], $text_size[6]]);
    $text_height = max([$text_size[5], $text_size[7]]) - min([$text_size[1], $text_size[3]]);

    // Center the text on image
    $centerX = CEIL(($width - $text_width) / 2);
    $centerX = $centerX < 0 ? 0 : $centerX;
    $centerY = CEIL(($height - $text_height) / 2);
    $centerY = $centerY < 0 ? 0 : $centerY;
    imagettftext($img, $font_size, $font_angle, $centerX, $centerY, $black, $font, $txt);


    //Render
    header("Content-type: image/png");
    imagepng($img);
    imagedestroy($img);
}
