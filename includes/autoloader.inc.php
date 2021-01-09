<?php
spl_autoload_register('classLoader');

function classLoader($className) 
{
    $path = "class/";
    $extension = ".class.php";
    $fullpath = $path . $className . $extension;

    if (!file_exists($fullpath))
    {
        return false;
    }

    include_once $fullpath;

}
?>
