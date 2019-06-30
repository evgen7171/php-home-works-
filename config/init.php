<!--
Инициализация данных
-->
<?php
include 'config/const.php';

// Функция подключения к базе данных
function myDB_connect($db_name)
{
    $defaultConfig = require ROOT_DIR . 'config/db_configs/config.default.php';

    if (!file_exists(ROOT_DIR . 'config/db_configs/config.php')) {
        echo 'Создайте файл конфигурации';
        $localConfig = [];
    } else {
        $localConfig = require ROOT_DIR . 'config/db_configs/config.php';
    }

    $config = array_merge($defaultConfig, $localConfig);

    $config['db_name'] = $db_name;

    $mysqli = mysqli_connect(
        $config['db_host'],
        $config['db_user'],
        $config['db_pass'],
        $config['db_name']
    );

    return $mysqli;
}

function myDB_connect_create()
{
    return mysqli_connect(
        "localhost",
        "root",
        "");
}

function site_name()
{
    $name = $_SERVER['REQUEST_URI'];
    preg_match('/[?]/', $name, $matches, PREG_OFFSET_CAPTURE);
    $name_start = mb_substr($name, 0, $matches[0][1]);
    if ($name_start[0] === '/') {
        $name_start = mb_substr($name_start, 1);
    } else if ($name_start === '') {
        $name_start = 'index.php';
    }
    return $name_start;
}

function show_hi($message = NULL)
{
    switch (site_name()) {
        case '':
        case 'index.php':
            return
                '<div class="text">
                    <p>Welcome To Our Shop!</p>
                    <h3>It’s nice to Meet you</h3>
                </div>';
        case 'catalog.php':
            return
                '<div class="text">
                    <h3>Каталог</h3>
                </div>';
        case 'cart.php':
            return
                '<div class="text">
                    <h3>Корзина</h3>
                </div>';
        case 'login.php':
            if ($_SERVER['REQUEST_URI'] === 'login.php?query=registration' ||
                $_SERVER['REQUEST_URI'] === '/login.php?query=registration') {
                include "public/registration.php";
            } else if ($_SERVER['REQUEST_URI'] === 'login.php?query=autorization' ||
                $_SERVER['REQUEST_URI'] === '/login.php?query=autorization') {
                include "public/autorization.php";
            }
    }
}


