<?php
class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include($routesPath);
    }

    private function getURI()//метод возврашает строку
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return $uri = trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    public function run()
    {
        {
            //Получение строку запроса
            $uri = $this->getURI();

            //Проверка наличие такого запроса в routes.php
            foreach ($this->routes as $uriPattern => $path) {
                //сравниваем $uriPattern and $uri\
                if (preg_match("~^$uriPattern$~", $uri)) {

                    // Получаем внутренний путь из внешнего согласно правилу.
                    $internalRoute = preg_replace("~^$uriPattern$~", $path, $uri);

                    $segments = explode('/', $internalRoute);

                    $controllerName = array_shift($segments) . 'Controller';
                    $controllerName = ucfirst($controllerName);


                    $actionName = 'action' . ucfirst(array_shift($segments));

                    $parameters = $segments;


                    $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                    if (file_exists($controllerFile)) {
                        include_once($controllerFile);
                    }



                    $controllerObject = new $controllerName;
                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                    if ($result != null) {
                        break;
                    }
                }

            }
        }
    }
}
?>