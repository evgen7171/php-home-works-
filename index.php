<!-- Главная страница -->
<?php

include "config/const.php";
include "config/init.php";

include 'engine/autoload.php';
autoload('config');

//получение
include ENGINE_DIR . 'read_db.php';
$image_arr = read_db_sort('gallery.images','clicks');

include PUBLIC_DIR . 'header.php';
include PUBLIC_DIR . 'block.php';
include PUBLIC_DIR . 'footer.php';

