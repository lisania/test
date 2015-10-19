<?php
class Router
{
  private $routes;

  public function __construct()
  {
    $routesPath=ROOT . '/config/routes.php';
    $this->routes = include($routesPath);
  }

  private function getURI()
  {
    if (!empty($_SERVER['REQUEST_URI'])) {
      return trim($_SERVER['REQUEST_URI'], '/');
    }
  }

  public function run()
  {
    // Получаем строку запроса
    $uri = $this->getURI();

    // Проверяем наличие такого запроса в массиве маршрутов (routes.php)
    foreach ($this->routes as $uriPattern => $path) {

      // Сравниваем $uriPattern и $uri
      if (preg_match("~$uriPattern~", $uri)) {

        // Получаем внутренний путь из внешнего согласно правилу.
        $internalRoute = preg_replace("~$uriPattern~", $path, $uri);

        // Определяем контроллер, action, параметры
        $segments = explode('/', $internalRoute);

        $controllerName = ucfirst(array_shift($segments) . 'Controller');
        $actionName = 'action' . ucfirst(array_shift($segments));

        $parameters = $segments;

        // Подключаем файл класса-контроллера
        $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
        if (file_exists($controllerFile)) {
          include_once($controllerFile);
        }

        // Создаем объект, вызываем action
        $controllerObject = new $controllerName;
        $result = $controllerObject->$actionName($parameters);

        // Если метод контроллера успешно вызван, завершить работу роутера
        if ($result != null) {
          break;
        }
      }
    }
  }
}
?>
