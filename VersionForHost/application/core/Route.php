<?php 

namespace App\core;

class Route
{    
    static public $routes = null;

    static function start()
    { 
        
        if (self::$routes == null) {
            $url = explode('index.php?', substr(strtolower($_SERVER['REQUEST_URI']), 1));
            self::$routes = explode('/', $url[0]);
        }
        
        $controller_name = 'main';
        $action_name = 'index';

        if (!empty(self::$routes[2])) {
            $controller_name = self::$routes[2];
        }

        if (!empty(self::$routes[3])) {
            $action_name = self::$routes[3];
        }

        $controller_class = 'App\\controllers\\'.$controller_name . 'Controller';
        $action_name = 'action'.$action_name;

        $controller = new $controller_class;

        if(method_exists($controller, $action_name)) {
            $controller->$action_name();
        }
        else {
            self::ErrorPage404();
        }
    }

    static function ErrorPage404()
    {
        $host = 'http://' . $_SERVER['HTTP_HOST'] . '/error/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:' . $host);
    }

}


