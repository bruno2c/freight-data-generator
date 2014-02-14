<?php
require_once '../config/Autoloader.php';
spl_autoload_register(array('Autoloader', 'load'));

define('BASE_PATH', realpath(__DIR__ . "/../"));
define('APPLICATION_PATH', BASE_PATH . "/application/");
define('SCRIPT_PATH', BASE_PATH . "/application/Scripts/");

Autoloader::addPath(realpath('../application').DIRECTORY_SEPARATOR);
Autoloader::addPath(realpath('../config').DIRECTORY_SEPARATOR);

try{
    $bootstrap = Bootstrap::getInstance();
    $bootstrap->run();
} catch(Exception $e){
    echo $e->getMessage();
}
