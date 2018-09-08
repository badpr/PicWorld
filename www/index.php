<?php
/*
* |   |
* |---| ARD #CODE
* |   |
* Bad Proggers, 2018. GNU License 2018-2019.
*/
define('BASE_DIR', $_SERVER['DOCUMENT_ROOT'].'/');
define('FR_DIR', $_SERVER['DOCUMENT_ROOT'].'/framework/');
define('TWIG_CACHE', FR_DIR . 'cache/');
define('APPS_DIR', BASE_DIR . 'apps/');
define('TMP_DIR', BASE_DIR . 'templates/');
define('TWIG_EXT', FR_DIR . 'modules/twig_extensions/');
define('CONF_PATH', BASE_DIR. 'config.php');

require(FR_DIR . 'autoload.php'); // Load lib

$app = new PcWEng( require('./config.php') ); // Aplication