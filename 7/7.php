<?php

function save_comments($comment){
    return file_put_contents('comments.txt',serialize($comment));
    clearstatcache();
}
function get_comments(){
    return unserialize(file_get_contents('comments.txt'));
}
if (file_exists('comments.txt')){
    $comments=get_comments();
}
if (isset($_POST['submit'])){
    $comment=[
        'user'=>$_POST['user'],
        'comment'=>$_POST['comment']
    ];
    if ($_POST['user']==null or $_POST['comment']==null){
        throw new Error('Enter comment or your user;');
    }
    $comments[]=$comment;
    save_comments($comments);
}
include '7.html';