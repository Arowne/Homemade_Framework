<?php
namespace Core;
class Core
{
  public function run()
  {
    require_once('routes.php');
    $arg = "/" . rtrim(substr($_SERVER['REQUEST_URI'],strlen(BASE_URI)+2), '/');
    $route = \Router::get($arg);
    $controller = new $route['controller'];
    $action = $route['action'];
    $controller->$action();
  }
}
