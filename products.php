<?php

function get_products()
{
    return read_db_table(DB_NAME, PRODUCTS_TABLE_NAME);
}

function get_cart()
{
    if (check_exist_db_table(DB_NAME, CART_TABLE_NAME)) {
        $cart = read_db_table(DB_NAME, CART_TABLE_NAME);
    } else {
        $columns = [
            'product_id',
            'product_name',
            'product_img',
            'product_price',
            'product_count'
        ];
        create_db_table(DB_NAME, CART_TABLE_NAME, $columns);
        $cart = read_db_table(DB_NAME, CART_TABLE_NAME);
    }
    return $cart;
}