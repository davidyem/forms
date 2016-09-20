<?php
function cur_dir($dir){
return scandir($dir);
}
echo "<pre>";
print_r(cur_dir(__DIR__));
echo "</pre>";