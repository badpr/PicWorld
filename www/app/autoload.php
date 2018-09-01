<?php
/*
* ===============
* Some load lib.
* ===============
*/
$i = 0;
$patch = $_SERVER['DOCUMENT_ROOT'].'/app/inc';
$app = $_SERVER['DOCUMENT_ROOT'].'/app/app.php';
if ($handle = opendir($patch)) {

    /* Ищем библиотеки */
    while (false !== ($file = readdir($handle))) { // Req. li
    	if($libsCount > 1){ // Del . & ..
    		require $patch.'/'.$file;
    	}
        $libsCount++;
    }

    closedir($handle); 
}

require $app;