<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '';
$images = scandir($path);
if (false !== $images) {
    $images = preg_grep('/\\.(?:png|gif|jpe?g)$/', $images);
    foreach ($images as $image)
        echo '<img src="//', htmlspecialchars(urlencode($image)),'" width="200" height="200" />';
}
?>