<?php

echo $str;

include_once 'additions.php';

define('SITE_ROOT', __DIR__ . DIRECTORY_SEPARATOR);
define('SITE_TITLE', 'Сайт');
define('PATH_TO_CSS', 'public' . DIRECTORY_SEPARATOR);
define('PATH_TO_JS', 'public' . SEPARATOR);
define('PATH_TO_IMAGES', 'public' .
    SEPARATOR . 'img' . SEPARATOR);

include_once 'engine/logic.php';

echo '<!DOCTYPE html><html lang="en">';
include_once 'header.php';
include_once 'main.php';
echo '<script src="http://code.jquery.com/jquery-1.8.3.js"></script>';
echo '<script src="' . PATH_TO_JS . 'js.js"></script>';
echo '</html>';

