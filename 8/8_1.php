<?php

// Простейший фотоальбом с возможностью закачки

$imgDir = dirname(__FILE__)."/../forms/";        // каталог для хранения изображений
@mkdir($imgDir, 0777);  // создаем, если его еще нет

// Проверяем, нажата ли кнопка добавления фотографии.
if (@$_REQUEST['doUpload']) {
    $data = $_FILES['file'];
    $tmp = $data['tmp_name'];
    // Проверяем, принят ли файл.
    if (@file_exists($tmp)) {
        $info = @getimagesize($_FILES['file']['tmp_name']);
        // Проверяем, является ли файл изображением.
        if (preg_match('{image/(.*)}is', $info['mime'], $p)) {
            // Имя берем равным текущему времени в секундах, а
            // расширение - как часть MIME-типа после "image/".
            $name = "$imgDir/".time().".".$p[1];
            // Добавляем файл в каталог с фотографиями.
            move_uploaded_file($tmp, $name);
        } else {
            echo "<h2>Попытка добавить файл недопустимого формата!</h2>";
        }
    } else {
        echo "<h2>Ошибка закачки #{$data['error']}!</h2>";
    }
}

// Теперь считываем в массив наш фотоальбом.
$photos = array();
foreach (glob("$imgDir/*") as $path) {
    $sz = getimagesize($path); // размер
    $tm = filemtime($path);    // время добавления
    // Вставляем изображение в массив $photos.
    $photos[$tm] = array(
        'time' => $tm,              // время добавления
        'name' => basename($path),  // имя файла
        'url'  => $path,            // его URI
        'w'    => $sz[0],           // ширина картинки
        'h'    => $sz[1],           // ее высота
        'wh'   => $sz[3]            // "width=xxx height=yyy"
    );
}
// Ключи массива $photos - время в секундах, когда была добавлена
// та или иная фотография. Сортируем массив: наиболее "свежие"
// фотографии располагаем ближе к его началу.
krsort($photos);
// Данные для вывода готовы. Дело за малым - оформить страницу.
?>

<body>
<form action="./upload/album.php" method="POST" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="doUpload" value="Закачать новую фотографию">
    <hr>
</form>
<?foreach($photos as $n=>$img) {?>
<p><img
        src="<?=$img['url']?>"
        <?=$img['wh']?>
        alt="Добавлена <?=date("d.m.Y H:i:s", $img['time'])?>"
    >
    <?}?>
</body>