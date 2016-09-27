<?php
define('MAT',['bad','worse','ugly']);
function save_comments($comment){
    return file_put_contents('comments.txt',serialize($comment));
    clearstatcache();
}
function get_comments(){
    return unserialize(file_get_contents('comments.txt'));
}
function bad_words($comment){
 foreach ($comment as $key=>$value)   {
     $comment[$key]=strip_tags(str_replace(MAT, '***', $value,$count),'<b>');
     if($count>0){
         echo 'Некорректный комментарий. - '.$value ."<br>";
     }
 }
    return $comment;
}
$form_was_send=false;

if (isset($_POST['submit'])){
    $form_was_send=true;
    $comment=[
        'user'=>$_POST['user'],
        'comment'=>$_POST['comment']
    ];
    if ($_POST['user']==null or $_POST['comment']==null){
        throw new Error('Enter comment or your user;');
    }
    $comment = bad_words($comment);
    $comments[]=$comment;
    save_comments($comments);
}
include '8.html';