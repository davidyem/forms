<?php
$string = 'lorem ipsum dolor sit amet, consectetur adipiscing elit. nunc scelerisque mattis justo.';
$result = preg_replace('~(?:\A|(\?|\.|\!)(\s+))(\w)~e','"$1"."$2".strtoupper("$3")',$string);
var_dump($result);
?>