<article class="products container">
    <div class="title">
        <h3>Our products</h3>
        <p>Proin iaculis purus consequat sem cure. </p>
    </div>
    <form action="/cart.php" class="items">
        <div class="row">
            <?php for ($i = 0;
            $i < count($products);
            $i++): ?>
            <?php if (!($i % 3)): ?>
        </div>
        <div class="row">
            <? endif; ?>
            <div data-id="<?= $products[$i]['id'] ?>" class="item myBtn">

                <div class="container">
                    <img src="<?= IMG__DIR . 'products/mini/' . $products[$i]['image'] ?>"
                         alt="<?= $products[$i]['image'] ?>">
                </div>
                <div class="text">
                    <h3><?= $products[$i]['title'] ?></h3>
                    <p><?= $products[$i]['desc'] ?></p>
                </div>
                <div class="price_buy">
                    <p class="price"><?= $products[$i]['price'] ?></p>
                    <input type="submit" class="buy" name="id_<?= $products[$i]['id'] ?>" value="Купить">
                </div>
            </div>
            <?php endfor ?>
        </div>
    </form>

    <?php include 'public/modal.php'; ?>

</article>