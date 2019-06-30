<?php

function get_feedbacks()
{
    $feedbacks = read_db_table(DB_NAME, FEEDBACKS_TABLE_NAME);
    $users = read_db_table(DB_NAME, USERS_TABLE_NAME);

    $feed_arr = [];

    for ($i = 0; $i < count($feedbacks); $i++) {
        for ($j = 0; $j < count($users); $j++) {
            if ($feedbacks[$i]['user_id'] === $users[$j]['id']) {
                $feed_arr[]['img'] = '<img src="/public/img/users/' . $users[$j]['avatar'] . '" alt="" width="50px">';
                $feed_arr[]['name'] = $users[$j]['name'];
                $feed_arr[]['text'] = $feedbacks[$i]['text'];
            }
        }
    }

    return $feed_arr;
}
