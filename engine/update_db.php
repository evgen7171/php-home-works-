<?php
/**
 * Функция обновления данных в базе данных
 * @param $db база данных, таблица
 * @param $id идентификатор, для того, чтобы найти параметр
 * @param $name параметр, который нужно обновить
 * @param $value новое значение параметра
 * @return bool|mysqli_result
 */
function update_db($db, $id, $name, $value)
{
    $query = "UPDATE $db SET $name = $value WHERE ID=$id;";

    return  mysqli_query(myDB_connect(), $query);
}
