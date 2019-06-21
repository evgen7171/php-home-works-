<?php

//страница таблицы

include "header.php";
?>
<table class="table">
    <tr>
        <td>№</td>
        <td>Название файла</td>
        <td>Путь к файлу</td>
        <td>Размер файла</td>
        <td>Размер изображения</td>
        <td>Популярность</td>
    </tr>
    <?php
    foreach ($image_arr as $image):
        $fileName = PATH_FOR_IMAGES . $image['file'];

        ?>
        <tr>
            <td><?= $image['ID'] ?></td>
            <td><?= $image['name'] ?></td>
            <td><?= PATH_FOR_IMAGES . $image['file'] ?></td>
            <td><?= filesize($fileName) ?></td>
            <td><?= get_size_image($fileName) ?></td>
            <td><?= $image['clicks'] ?></td>
        </tr>
    <?php
    endforeach
    ?>
</table>
?
<php
        include "footer.php";