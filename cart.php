<?php
include 'config/const.php';
include 'config/init.php';
include 'engine/crud.php';

include 'feedbacks.php';
include 'products.php';

include 'public/header.php';

echo $_GET;

include 'public/cart.php';
include 'public/footer.php';