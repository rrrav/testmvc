<?php

/**
 * Компонент для обрабоки маршрутов
 *
 * @author user
 */
class Router {

    /**
     * Массив роутов
     * @var array 
     */
    private $routes;

    public function __construct() {
        // Путь к файлу роутов
        $routesPath = ROOT . '/config/routes.php';
        // Получение роутов из файла
        $this->routes = include($routesPath);
    }

    /**
     * Метод получения URI
     * @return string
     */
    private function getUri() {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     * Метод обработки запросов
     */
    public function start() {
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
                    break;
                }
            }
        }
    }

}
