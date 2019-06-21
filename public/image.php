<!-- картинка на странице -->

<div class="container">
    <img src="<?= PATH_FOR_IMAGES . $image[0]['file'] ?>"
         alt="<?= $image[0]['name'] ?>">
    <p>Название картинки: <?= $name ?></p>
    <p>Количество просмотров: <?= $clicks ?></p>
</div>