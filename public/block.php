<!-- Блок с картинками для галереи -->

<?php
include 'config/const.php';
?>
<form action="/image.php" class="images-block" method="GET">
    <?php foreach ($image_arr as $image): ?>
        <div class="image">
            <a href="/image.php?ID=<?=$image['ID']?>">
                <img src="<?= PATH_FOR_MINI . $image['file'] ?>"
                     alt="<?= $image['name'] ?>">
            </a>
        </div>
    <?php endforeach ?>
</form>
