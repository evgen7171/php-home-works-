<?php

$dirForMini = PATH_TO_IMAGES . 'galleryMini/';
$dirForWrap = PATH_TO_IMAGES . 'galleryWrapper/';
define('WIDTH_MINI', 150);

copyImagesFromData(PATH_TO_GALLERY, $dirForWrap, $dirForMini);

function copyImagesFromData($pathFrom, $dirForWrap, $dirForMini)
{
    createFolder($dirForMini);
    createFolder($dirForWrap);

    $dir = opendir($pathFrom);
    while ($fileName = readdir($dir)) {
        if (
            $fileName == '.' ||
            $fileName == '..' ||
            is_dir($pathFrom . $fileName)) {
            continue;
        }
        $fileNameSource = $pathFrom . $fileName;
        $fileNameCopy = $dirForWrap . $fileName;
        copy($fileNameSource, $fileNameCopy);
        createMiniCopy($fileName, $pathFrom, $dirForMini);
    }
    closedir($dir);
}

function createMiniCopy($fileName, $pathFromFile, $pathForNew)
{
    list($width, $height,) = getimagesize($pathFromFile . $fileName);
    if ($width > WIDTH_MINI) {
        $ratio = WIDTH_MINI / $width;
    } else {
        $ratio = 1;
    }
    $new_width = $width * $ratio;
    $new_height = $height * $ratio;
    $image_p = imagecreatetruecolor($new_width, $new_height);
    $image = imagecreatefromjpeg($pathFromFile . $fileName);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    $fileTo = fopen($pathForNew . $fileName, 'w+');
    imagejpeg($image_p, $fileTo);
    imagedestroy($image_p);
}

function createFolder($dir)
{
    if (!is_dir($dir))
        mkdir($dir, 0777);
}

