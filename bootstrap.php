<?php
function myAutoloader($classname)
{
    include(__DIR__ . DIRECTORY_SEPARATOR . $classname . '.php');
}

spl_autoload_register('myAutoloader');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
