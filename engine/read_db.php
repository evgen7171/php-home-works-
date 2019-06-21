<?php
/**
 * Функция чтения базы данных
 * @param $db база данных, таблица
 * @param null $image_id ID картинки
 * @return array данные таблицы базы данных
 */
function read_db($db, $id = NULL)
{
    $query = "SELECT * FROM $db";

    if ($id != NULL)
        $query .= " WHERE ID = $id;";

    $result = mysqli_query(myDB_connect(), $query);

    $image_arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $image_arr[] = $row;
    }
    return $image_arr;
}
/**
 * Функция чтения и сортировки базы данных
 * @param $db база данных, таблица
 * @param $sort параметр для сортировки
 * @return array данные таблицы базы данных
 */
function read_db_sort($db, $sort = NULL)
{
    $query = "SELECT * FROM $db";

    if ($sort != NULL)
        $query .= " ORDER BY $sort DESC;";

    $result = mysqli_query(myDB_connect(), $query);

    $image_arr = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $image_arr[] = $row;
    }
    return $image_arr;
}