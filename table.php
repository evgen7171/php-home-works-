<?php
include "config/const.php";
include "config/init.php";

//получение и сортировка данных по популярности из базы данных
include ENGINE_DIR . 'read_db.php';
$image_arr = read_db('gallery.images');

/** Функция для получения размера изображения
 * @param $fileName имя файла
 * @return string строка формата width x height
 */
function get_size_image($fileName)
{
    $size_image_str = getimagesize($fileName)[3];
    $size_image_str = str_ireplace(" ", "&", $size_image_str);
    $size_image_str = str_ireplace("\"", "", $size_image_str);
    parse_str($size_image_str, $size_image);
    return $size_image['width'] . 'x' . $size_image['height'];
}

include PUBLIC_DIR.'table.php';