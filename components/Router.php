<?php

/**
 * Front controller
 *
 * @author user
 */
class Router
{

    /**
     * An array of routes
     * @var array $routes
     */
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    /**
     *
     * @return string
     */
    private function getUri()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
    
    public function start()
    {
        /**
         * Get URI
         */
        $uri = $this->getUri();

        foreach ($this->routes as $patternUri => $path) {
            if (preg_match("~$patternUri~", $uri)) {
                $internalRoute = preg_replace("~$patternUri~", $path, $uri);
                $segments = explode('/', $internalRoute);

                $controllerName = ucfirst(array_shift($segments)) .
                        'Controller';
                $actionName = 'action' . ucfirst(array_shift($segments));
                $params = $segments;

                $controllerPath = ROOT . '/controllers/' .
                        $controllerName . '.php';
                if (file_exists($controllerPath)) {
                    include_once($controllerPath);
                }

                $controllerObj = new $controllerName;
                $result = call_user_func_array(
                        array($controllerObj, $actionName), $params
                );
                if ($result != null) {
                    exit();
                }
            }
        }
    }
}
