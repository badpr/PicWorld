<?php

// Require a composer
require(FR_DIR . 'core/composer/vendor/autoload.php');

// Require a system classes
require(FR_DIR . 'core/classes/system.php'); // System Inc
require(FR_DIR . 'core/classes/controller.php'); // Controller Inc

// Connect modules
$modules = glob( FR_DIR.'core/modules/*.module.php' );
foreach ($modules as $module) {
    require $module;
}

// Start the suite
require(FR_DIR . 'core/bootstrap.php'); // Bootstrap Inc