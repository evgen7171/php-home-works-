<?php

include_once 'additions.php';

$dirForUpload = "data/gallery/";
$blacklist = array(".php", ".phtml", ".php3", ".php4", ".html", ".htm");
foreach ($blacklist as $item)
    if (preg_match("/$item\$/i", $_FILES['somename']['name'])) exit;
$type = $_FILES['somename']['type'];
$size = $_FILES['somename']['size'];

$fileCount = countFiles(PATH_TO_GALLERY);
$newFileName = PATH_TO_GALLERY . 'image-' . ($fileCount + 1) . '.jpg';

if (($type != "image/jpg") && ($type != "image/jpeg")) exit;
$uploadfile = $dirForUpload . $_FILES['somename']['name'];
if (!move_uploaded_file($_FILES['somename']['tmp_name'], $newFileName)) {
    echo 'Не удалось загрузить файл';
} else {
    $str = '123123';
    $header = "Content-Disposition: attachment; str=" . $str . ";";
    header($header);
    header('Location: index.php');
    exit;
}


/*
echo "<h3>Информация о загруженном на сервер файле: </h3>";
echo "<p><b>Оригинальное имя загруженного файла: " . $_FILES['uploadfile']['name'] . "</b></p>";
echo "<p><b>Mime-тип загруженного файла: " . $_FILES['uploadfile']['type'] . "</b></p>";
echo "<p><b>Размер загруженного файла в байтах: " . $_FILES['uploadfile']['size'] . "</b></p>";
echo "<p><b>Временное имя файла: " . $_FILES['uploadfile']['tmp_name'] . "</b></p>";
*/
?>