<?php
$str = 'абвгде';
echo $str, ' => ' , reverse($str);
function reverse($str){
    $arr = preg_split('//u', $str, -1 ,PREG_SPLIT_NO_EMPTY);
    return implode('',array_reverse($arr));
}