<?php

PHP_OS == "Windows" ? define("SEPARATOR", "\\") : define("SEPARATOR", "/");

define('PATH_TO_GALLERY', 'data' .
    SEPARATOR . 'gallery' . SEPARATOR);

function countFiles($dir){
    $fi = new FilesystemIterator($dir, FilesystemIterator::SKIP_DOTS);
    return iterator_count($fi);
}