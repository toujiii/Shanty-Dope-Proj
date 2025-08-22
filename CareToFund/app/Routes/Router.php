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
                $controllerName = $route['handler']; // e.g., 'HomeController'
                $controllerFQCN = "CareToFund\\Controllers\\$controllerName"; // Full class name with namespace

                // Load the controller file if not loaded
                if (!class_exists($controllerFQCN)) {
                    $file = __DIR__ . "/../../Controllers/{$controllerName}.php";
                    if (file_exists($file)) {
                        require_once $file;
                    }
                }

                // Instantiate and call the default method
                (new $controllerFQCN)->index();
                return;
            }
        }
        http_response_code(404);
        echo '404 Not Found';
    }
}
