<?php

function create_db($db)
{
    $query = "CREATE DATABASE $db";
    $mysqli = myDB_connect_create();
    $result = mysqli_query($mysqli, $query);
    mysqli_close($mysqli);
    return $result;
}

function create_db_table($db, $table, $names)
{
    $str = '';
    foreach ($names as $name) {
        if ($name === 'text') {
            $str .= "$name TEXT NULL ,";
        } else {
            $str .= "$name VARCHAR(45) NULL ,";
        }
    }
    $query = "
        CREATE  TABLE $db.$table (
        `id` INT NOT NULL AUTO_INCREMENT , 
        " . $str . " 
        PRIMARY KEY (`id`) );";
    $mysqli = myDB_connect($db);
    $result = mysqli_query($mysqli, $query);
    return $result;
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
        $str_values .= "'".$value[$i]."'";
    }
    $query = "INSERT INTO $db.$table ($str_keys)
            VALUES ($str_values);";
    echo $query;
    $mysqli = myDB_connect($db);
    $result = mysqli_query($mysqli, $query);
    return $result;
}