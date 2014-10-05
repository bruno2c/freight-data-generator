<?php

require '../vendor/autoload.php';

define('BASE_PATH', realpath(__DIR__ . "/../"));
define('APPLICATION_PATH', BASE_PATH . "/application/");
define('SCRIPT_PATH', BASE_PATH . "/application/Scripts/");
define('APPLICATION_NAMESPACE', "FreightDataGenerator\Application\\");

try{
    $bootstrap = FreightDataGenerator\Config\Bootstrap::getInstance();
    $bootstrap->run();

    $script = $bootstrap->resolveUrl();

    if($script){
		$script->execute();

		echo "RAN";
    }
} catch(Exception $e){
    echo $e->getMessage();
}