<?php
/////////////
///
define('ROOT_DIR', __DIR__ . '/../');

CONST DB_NAME = 'shop_data';
CONST PRODUCTS_TABLE_NAME = 'products';
CONST USERS_TABLE_NAME = 'users';
CONST FEEDBACKS_TABLE_NAME = 'feedbacks';
CONST CART_TABLE_NAME = 'cart';

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

function create_db_table_string($db, $table, $obj)
{
    $str_keys = '';
    $str_values = '';

    $arg = array_keys($obj);
    $value = array_values($obj);
    for ($i = 0; $i < count($arg); $i++) {
        if ($i > 0) {
            $str_keys .= ', ';
            $str_values .= ', ';
        }
        $str_keys .= $arg[$i];
        $str_values .= "'" . $value[$i] . "'";
    }
    $query = "INSERT INTO $db.$table ($str_keys)
            VALUES ($str_values);";
    $mysqli = myDB_connect($db);
    $result = mysqli_query($mysqli, $query);
    return $result;
}

function read_db_table($db, $table)
{
    $query = "SELECT * FROM $db.$table";
    $result = mysqli_query(myDB_connect($db), $query);
    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return $arr;
}

/////////////////////////

function verification_login($user_name, $email, $pass)
{
    $user_input = [
        'name' => $user_name,
        'email' => $email,
        'pass' => $pass
    ];
    $users = read_db_table(DB_NAME, USERS_TABLE_NAME);
    foreach ($users as $user) {
        if ($user_name === $user['name']) {
            $user_check = $user;
        }
    }
    if ($user_check === NULL) {
        return [
            'message' => 'неверное имя пользователя',
            'user' => $user_input
        ];
    } else if (!password_verify($pass, $user_check['pass'])) {
        return [
            'message' => 'неверный пароль пользователя',
            'user' => $user_input
        ];
    } else {
        setcookie('isAuth', 'true', time() + 10000);
        return [
            'message' => 'вход выполнен успешно',
            'user' => $user_check
        ];
    }
}

function is_exist_db_name_user($db, $table, $user_name)
{
    /*
    $query = sprintf('SELECT * FROM "%s" WHERE name="%s" ', $db . $table, $user_name);
    $mysql = mysqli_query(myDB_connect($db), $query);
    $user = mysqli_fetch_assoc($mysql);
    if (!is_null($user)) {
        return $user;
    } else {
        return false;
    }
    */

    $db_table = read_db_table($db, $table);
    foreach ($db_table as $string) {
        if ($user_name === $string['name']) {
            return true;
        }
    }
    return false;
}

function registration($name, $email, $pass)
{
    $message = '';
    $object = verification_login($name, $email, $pass);
    if ($object['message'] === 'неверное_имя') {
        $message = '&message=имя_занято';
    } else {
        $pass_hash = password_hash($object['user']['pass'], PASSWORD_DEFAULT);
        $user_data = [
            'name' => $object['user']['name'],
            'email' => $object['user']['email'],
            'pass' => $pass_hash
        ];

        if (is_exist_db_name_user(DB_NAME, USERS_TABLE_NAME, $user_data['name'])) {
            $message = '&message=имя_занято';
        } else {
            $user_data = create_db_table_string(DB_NAME, USERS_TABLE_NAME, $user_data);
            session_start();
            $_SESSION['isAuth'] = true;
            $_SESSION['user_id'] = $user_data;
        }
    }
    header('Location: /login.php' . $message);
    die;
}

function autorization($name, $email, $pass)
{
    $object = verification_login($name, $email, $pass);
    if ($object['message'] !== 'вход_выполнен_успешно') {
        session_start();
        $_SESSION['isAuth'] = true;
        $_SESSION['user'] = $object['user'];
        header('Location: /login.php?message=' . $object['message']);
        die;
    }
}

/////////////

if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    if ($_GET['query'] === 'registration') {
        registration($name, $email, $pass);
    } else if ($_GET['query'] === 'autorization') {
        autorization($name, $email, $pass);
    }
}

