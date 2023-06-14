<?php

//■■■■■■■■■■■■■■■■■■■■■■■■■ definition of the autoload function, which includes require classes as they are used ■■■■■■■■■■■■■■■■■■■■■■■■■ //

function autoloader($class)
{
    $classFile = __DIR__ . '\\' . 'class_'.$class . '.php';
    
    if (file_exists($classFile)) {
        require_once $classFile;
    }
}

//■■■■■■■■■■■■■■■■■■■■■■■■■ setting function as autoload ■■■■■■■■■■■■■■■■■■■■■■■■■ //

spl_autoload_register('autoloader');

?>