<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

define('URL_PUBLIC_FOLDER', 'public');
define('URL_PROTOCOL', 'http://');
define('URL_DOMAIN', $_SERVER['HTTP_HOST']);
define('URL_SUB_FOLDER', dirname($_SERVER['SCRIPT_NAME']));

// Duplicate env/env.php.dist to env/env.php to override database credentials!
if (file_exists(__DIR__ . '/env.php')) {
    require 'env.php';
}

if (! defined('DATABASE_HOST')) define('DATABASE_HOST', 'localhost');
if (! defined('DATABASE_NAME')) define('DATABASE_NAME', 'mini-mvc');
if (! defined('DATABASE_USER')) define('DATABASE_USER', 'root');
if (! defined('DATABASE_PASSWORD')) define('DATABASE_PASSWORD', '');

// If subdirectory exists
if (strlen(URL_SUB_FOLDER) > 1) {
    define('URL', URL_PROTOCOL . URL_DOMAIN . URL_SUB_FOLDER . DIRECTORY_SEPARATOR);
} else {
    define('URL', URL_PROTOCOL . URL_DOMAIN . DIRECTORY_SEPARATOR);
}