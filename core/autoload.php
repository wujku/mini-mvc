<?php

define('EXT', '.php');
define('CONTROLLERS_PATH', ROOT . 'controllers' . DIRECTORY_SEPARATOR);
define('MODELS_PATH', ROOT . 'models' . DIRECTORY_SEPARATOR);
define('CORE_PATH', ROOT . 'core'. DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR);
define('LIBRARY_PATH', ROOT . 'library' . DIRECTORY_SEPARATOR);

function loadControllers($class_name)
{
    if (preg_match('/(.*)Controller/', $class_name)) {
        if (file_exists(CONTROLLERS_PATH . $class_name . EXT)) {
            require CONTROLLERS_PATH . $class_name . EXT;
        }
    }
}

function loadModels($class_name)
{
    if (preg_match('/(.*)Model/', $class_name)) {
        if (file_exists(MODELS_PATH . $class_name . EXT)) {
            require MODELS_PATH . $class_name . EXT;
        }
    }
}

function loadCore($class_name)
{
    if (file_exists(CORE_PATH . $class_name . EXT)) {
        require CORE_PATH . $class_name . EXT;
    }
}


function LoadLibrary($class, $dir = LIBRARY_PATH)
{
    $class_names = [strtolower($class), $class];

    foreach (scandir($dir) as $file) {

        // directory?
        if (is_dir($dir . $file) && substr($file, 0, 1) !== '.') {
            LoadLibrary($class, $dir . $file . DIRECTORY_SEPARATOR);
        }

        // php file?
        if (substr($file, 0, 2) !== '._' && preg_match("/.php$/i", $file)) {

            $file_without_ext = str_replace(EXT, '', $file);
            $file_without_class_ext = str_replace('.class' . EXT, '', $file);

            // filename matches class?
            if (
                in_array($file_without_ext, $class_names)
                || in_array($file_without_class_ext, $class_names)
            ) {
                require $dir . $file;
            }
        }
    }
}

spl_autoload_register('loadControllers');
spl_autoload_register('loadModels');
spl_autoload_register('loadCore');
spl_autoload_register('LoadLibrary');

