<?php
/*
* |   |
* |---| ARD #CODE
* |   |
* Bad Proggers, 2018. GNU License 2018-2019.
*/
define('BASE_DIR', $_SERVER['DOCUMENT_ROOT'].'/');
define('FR_DIR', $_SERVER['DOCUMENT_ROOT'].'/framework/');

require(FR_DIR.'core/load.php'); // Load lib

$app = new PcWEng( require('./config.php') ); // Aplication