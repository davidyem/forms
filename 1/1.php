<?php
include '1.html';
$a = $_POST ['a'];
$b = $_POST ['b'];
//$a='11111 3 11 aa bb';
//$b='11111 ff 11 22';
function getCommonWords($a, $b){
    $a=explode(' ',$a);
    $b=explode(' ',$b);
    for ($i = 0; $i < count($a); $i++) {
        $test=false;
        for ($j = 0; $j < count($b); $j++) {
            if($a[$i]===$b[$j]){
                $result[]=$a[$i];
                $test=true;
                break;
            }
        }if($test==false){
            // echo "Строка а(".$a[$i].") не совпала\n";
        }
    }return $result;
}
print_r(getCommonWords($a,$b));