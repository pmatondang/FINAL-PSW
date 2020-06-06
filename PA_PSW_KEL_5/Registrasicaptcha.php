<?php
    session_start();
    $code = rand (1000,9999);
    $_SESSION["code"]= $code;
    $im = imagecreatetruecolor(150, 50);
    $bg = imagecolorallocate($im, 25,86,165);
    $fg = imagecolorallocate($im, 225, 255, 255);
    imagefill($im, 0, 0,$bg);
    imagestring($im, 10, 50, 15, $code, $fg);
    header ("Cache-Control : no -cache, must-revalidated");
    header ('Content-type : image/png');
    imagepng ($im);
    imagedestroy($im);
?>