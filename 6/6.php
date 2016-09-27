<?php
$pic_weight = 3000;
$pic_height = 3000;

if (isset($_FILES))
{

    foreach ($_FILES['file']['name'] as $k=>$v)
    {

        $uploaddir = "../forms/";
        $apend=date('YmdHis').rand(100,1000).'.png';
        $uploadfile = "$uploaddir$apend";

        if($_FILES['file']['type'][$k] == "image/gif" || $_FILES['file']['type'][$k] == "image/png" ||
            $_FILES['file']['type'][$k] == "image/jpg" || $_FILES['file']['type'][$k] == "image/jpeg")
        {
            $blacklist = array(".php", ".phtml", ".php3", ".php4");
            foreach ($blacklist as $item)
            {
                if(preg_match("/$item\$/i", $_FILES['file']['name'][$k]))
                {
                    echo "Нельзя загружать скрипты.";
                    exit;
                }
            }

            if (move_uploaded_file($_FILES['file']['tmp_name'][$k], $uploadfile))
            {

                $size = getimagesize($uploadfile);
                if ($size[0] < $pic_weight && $size[1] < $pic_height)
                {
                    echo "<center><br>Файл ($uploadfile) загружен.</center>";

                }
                else
                {
                    echo "<center><br>Размер пикселей превышает допустимые нормы.</center>";
                    unlink($uploadfile);
                }
            }
            else
                echo "<center><br>Файл не загружен, вернитесь и попробуйте еще раз.</center>";
        }
        else
            echo "<center><br>Можно загружать только изображения в форматах jpg, jpeg, gif и png.</center>";
    }
    echo"<meta http-equiv='Refresh' content='1; URL=6_1.php'>";
}

?>