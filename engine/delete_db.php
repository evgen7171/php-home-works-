<?php

function delete_db_table($db, $table)
{
    $query = "DROP TABLE $db.$table";
    $mysqli = myDB_connect($db);
    $result = mysqli_query($mysqli, $query);
    return $result;
}

function delete_db($db)
{
    $query = "DROP SCHEMA $db;";
    $mysqli = myDB_connect($db);
    $result = mysqli_query($mysqli, $query);
    return $result;
}

function delete_db_table_string($db, $table, $id)
{
    $query = "DELETE FROM $db.$table WHERE `id`='$id';";
    $mysqli = myDB_connect($db);
    $result = mysqli_query($mysqli, $query);
    return $result;
}