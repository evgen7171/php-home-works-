<?php
/**
 * Функция чтения базы данных
 * @param $db база данных, таблица
 * @param null $image_id ID картинки
 * @return array данные таблицы базы данных
 */
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

function read_db_table_string($db, $table, $id)
{
    $query = "SELECT * FROM $db.$table WHERE ID = $id;";
    $result = mysqli_query(myDB_connect($db), $query);
    $arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $arr[] = $row;
    }
    return $arr;
}

function read_db_table_column($db, $table, $id, $column)
{
    $query = "SELECT * FROM $db.$table WHERE ID = $id;";
    $result = mysqli_query(myDB_connect($db), $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $keys = array_keys($row);
        $values = array_values($row);
        for ($i = 0; $i < count($row); $i++) {
            if ($keys[$i] === $column) {
                $value = $values[$i];
            }
        }
    }
    return $value;
}

function check_exist_db_table($db, $table)
{
    $query = "SELECT * FROM $db.$table";
    $result = mysqli_query(myDB_connect($db), $query);
    return $result;
}
