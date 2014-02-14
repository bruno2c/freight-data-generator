<?php

class Autoloader 
{
    protected static $paths = array();

    public static function addPath($path)
    {
        self::$paths[] = $path;
    }

    public static function load($class)
    {
        $classPath = str_replace('\\', DIRECTORY_SEPARATOR, $class).".php";
        foreach (self::$paths as $path) {
            if(is_file($path.$classPath)){
                require_once $path.$classPath;
                return;
            }
        }
    }
}