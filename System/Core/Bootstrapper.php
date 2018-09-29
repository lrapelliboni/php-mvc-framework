<?php
namespace System\Core;
use \System\Core\Utils\ConfigLoader;

class Bootstrapper {
    const CONTROLLERS_PATH = '\\App\\Controllers';
   
    /**
     * @var string[]
     */
    private static $segments;
    
    private static function getControllerName()
    { 
        $controller = !empty(self::$segments[0]) 
            ? self::$segments[0] : (ConfigLoader::getInstance())->getValue('default_controller');

        return \ucfirst($controller);
    }

    private static function getActionName()
    {
        return !empty(self::$segments[1]) 
            ? self::$segments[1] : (ConfigLoader::getInstance())->getValue('default_action');
    }

    private static function getParameters()
    {    
        return array_slice(self::$segments, 2);
    }

    public static function run()
    {
        self::$segments = !empty($_GET['path']) ? explode('/' , $_GET['path']) : [];
        $controller = sprintf(
            '%s\\%s%s', 
            self::CONTROLLERS_PATH, 
            self::getControllerName(),
            'Controller'
        );
        $action = self::getActionName();
        (new $controller())->$action(...self::getParameters());
    }
}