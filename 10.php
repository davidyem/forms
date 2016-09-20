<?php
if(!empty($_POST['txt'])){
$res = uniqueCount($_POST['txt']);
}
?>
<html>
<head></head>
<body>
<form action "" method="post">
<label>Enter text</label><br>
<textarea name="txt""></textarea>
<br>
<button type="submit">Send</button>
<pre>
<?php
   if(isset($res)):
    print_r ($res);
    endif;
?>
</pre>
</form>
</body>
</html>
<?php
function uniqueCount($text){
    $arr = preg_split('/\s/u', $text, -1 ,PREG_SPLIT_NO_EMPTY);
    $arr = array_unique($arr);
    return sizeof($arr);
}
?>


