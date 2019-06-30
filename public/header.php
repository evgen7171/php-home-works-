<!-- Заголовок страницы -->
<?php
if (site_name() !== 'login.php') {
    $products = get_products();
    $cart = get_cart();
    $feedbacks = get_feedbacks();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css"
          integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href=<?= CSS_DIR . "style.css" ?>>
    <link rel="stylesheet" href=<?= CSS_DIR . "modal.css" ?>>
    <link rel="stylesheet" href=<?= CSS_DIR . "login.css" ?>>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>My shop</title>
</head>
<body>
<div class="container">
    <header class="header_main">
        <div class="slider">
            <div class="header">
                <div class="logo">
                    <a href="/index.php" class="text">Golden</a>
                </div>
                <nav class="menu">
                    <ul>
                        <li class="list"><a href="/index.php" class="link">Home</a></li>
                        <li class="list"><a href="/catalog.php" class="link">products</a></li>
                        <li class="list"><a href="/cart.php" class="link">cart</a></li>
                        <li class="list"><a href="/index.php#contact" class="link">Contact</a></li>
                        <li class="list">
                            <?php if ($_SESSION['isAuth']): ?>
                                <a href="/engine/logout.php">Выйти</a>
                                <div class="user">Personal</div>
                            <?php else: ?>
                                <a href="/login.php?query=registration" class="link">Sign in</a>
                                <span class="link">&nbsp;/&nbsp;</span>
                                <a href="/login.php?query=autorization" class="link">Sign up</a>
                            <?php endif; ?>
                        </li>
                    </ul>
                </nav>
            </div>
            <?= show_hi($message) ?>
        </div>
    </header>
</div>