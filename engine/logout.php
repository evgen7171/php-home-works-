<?php
if (isset($_POST['logout'])) {
    setcookie('isAuth', 'true', time() - 1);
    session_destroy();
}