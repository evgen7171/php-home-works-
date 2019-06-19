<body>
<div class="container">
    <header class="header">
        Галерея изображений
    </header>
    <form id="gallery" action="index.php" method="POST">
        <div class="image-block">
            <?php for ($i = 1; $i <= countFiles(PATH_TO_GALLERY); $i++) { ?>
                <div class="image">
                    <input type="image" src="<?= PATH_TO_IMAGES . 'galleryMini/' ?>image-<?= $i ?>.jpg"
                           name="image-<?= $i ?>" id="image-<?= $i ?>">
                </div>
            <?php } ?>
        </div>
    </form>
    <hr>
    <form id="upload-container" method="POST" action="loading.php" enctype='multipart/form-data'>
        <img id="upload-image" src="public/img/upload.png" alt="">
        <div>
            <input id="file-input" type="file" name="somename" multiple onchange="handleUpload();">
            <label for="file-input">Выберите файл</label>
            <span>или перетащите его сюда</span>
        </div>
    </form>

    <!--    <form action="loading.php" method="post" enctype='multipart/form-data'>-->
    <!--        <input type="file" name="somename"/>-->
    <!--        <input type="submit" value="Загрузить"/>-->
    <!--    </form>-->

</div>
</body>

<?php

