<?php
error_reporting(E_ALL);
$way = '../forms';
$dir= opendir($way);
while(($a =  readdir($dir)) !== false){
	if(preg_match('/\d+/',$a)){
		echo $a, '<br/>';
	}
}
closedir($dir);
?>