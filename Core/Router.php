<?php

namespace App\Core;

class Router implements RouterInterface{
    protected static $controller = [];
    protected static $request;
    protected static $method;
    protected static $postBody = [];

    public static function resource($name) {
        $names = explode('.', $name);

        foreach($names as $key => $thisName) {
            $names[$key] = ucfirst($thisName);
        }

        $name = implode($names);
        self::$controller[$name] = "App\\Controllers\\{$name}Controller";
        self::$request = explode("/", substr(@$_SERVER['PATH_INFO'], 1));
        self::$method = strtolower($_SERVER['REQUEST_METHOD']);

        if ($_POST) {
            foreach ($_POST as $key => $value) {
                self::$postBody[$key] = $value;
            }
        }
    }

    public function run() {
        $controllerNameArray = [];
        $lengthOfUrl = count(self::$request);

        foreach (self::$request as $key => $r) {
            if (!is_numeric($r)) {
                $controllerNameArray[] = ucfirst($r);
                unset(self::$request[$key]);

                if ($key == ($lengthOfUrl - 1) && self::$method == 'get') {
                    self::$method = 'index';
                }

                continue;
            }
        }

        $controllerName = implode($controllerNameArray);

        if (self::$method == 'patch') {
            self::$method = 'update';
        } else if (self::$method == 'post') {
            self::$method = 'create';
        }
        
        if (self::$method == 'create' && count(self::$postBody)) {
            if (method_exists(self::$controller[$controllerName], self::$method)) {
                return call_user_func_array(self::$controller[$controllerName].'::'. self::$method, self::$postBody);
            }

            echo('404 Page Not Found');
        }

        if (!method_exists(self::$controller[$controllerName], self::$method)) {
            echo('404 Page Not Found');
            return;
        }

        return call_user_func_array(self::$controller[$controllerName].'::'. self::$method, self::$request);
    }

    public function direct()
    {
        self::run();
    }

    public static function load($file){
        $router = new static;

        require $file;

        return $router;
    }
}