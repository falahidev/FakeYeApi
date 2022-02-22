<?php

include 'app/FarsiGD.php';

$response = [];

if (!isset($_POST['text'])) {

    $response['error'] = true;
    $response['message'] = 'Please send true params';

    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($response, JSON_UNESCAPED_UNICODE);

    exit;
}

$gd = new FarsiGD();
$ye_image = imagecreatefrompng('assets/image/Ye.png');

$text = $_POST['text'];
$text = $gd->persianText($text, 'fa', 'normal');
imagettftext($ye_image, 15, 0, 560 / 2, 450, $white_color, 'assets/fonts/cour.TTF', $text);

ob_clean();
header('Content-type: image/png');
imagepng($ye_image);
imagedestroy($ye_image);