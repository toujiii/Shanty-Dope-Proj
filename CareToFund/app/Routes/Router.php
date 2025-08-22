<?php
namespace CareToFund\Controllers;

class Router {
    private $routes = [];

    public function add($method, $path, $handler) {
        $this->routes[] = compact('method', 'path', 'handler');
    }

    public function dispatch($method, $uri) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                [$controller, $action] = $route['handler'];
                (new $controller)->$action();
                return;
            }
        }
        http_response_code(404);
        echo '404 Not Found';
    }
}
