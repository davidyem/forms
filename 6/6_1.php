<?php
$path = $_SERVER['DOCUMENT_ROOT'] . '/6/';
$images = scandir($path);
if (false !== $images) {
    $images = preg_grep('/\\.(?:png|gif|jpe?g)$/', $images);
    foreach ($images as $image)
        echo '<img src="/6/', htmlspecialchars(urlencode($image)),'" width="200" height="200" />';
}
?>