<!-- Заголовок страницы -->
<?php
define('CSS_ROOT', '/public/css/');
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="<?= CSS_ROOT ?>style.css">
    <title>Gallery</title>
</head>
<body>
<header class="header header__flex">
        <a href="index.php" class="header__button">Gallery</a>
        <a href="table.php" class="header__button">Таблица</a>
</header>