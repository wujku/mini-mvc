<?php

session_start();

define('ROOT', __DIR__ . '/..' . DIRECTORY_SEPARATOR);

require ROOT . 'env/config.php';

// Autoloader for Controllers, Models and Core classes
require ROOT . 'core/autoload.php';

// Helper functions
require ROOT . 'core/helper.php';

require ROOT . 'core/classes/Application.php';

$app = new Application();