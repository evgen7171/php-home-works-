<?php
include 'config/const.php';
include 'config/init.php';

if (isset($_GET['ID'])) {
    $image_id = $_GET['ID'];
}

include ENGINE_DIR . "read_db.php";
include ENGINE_DIR . "update_db.php";
$image = read_db('gallery.images', $image_id);
$name = $image['0']['name'];
$clicks = $image['0']['clicks'] + 1;
update_db('gallery.images', $image_id, 'clicks', $clicks);

include PUBLIC_DIR . "header.php";
include PUBLIC_DIR . "image.php";
include PUBLIC_DIR . "footer.php";