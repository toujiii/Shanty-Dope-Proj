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
                $handler = $route['handler'];
                if (is_array($handler)) {
                    $controllerName = $handler[0];
                    $action = $handler[1] ?? 'index';
                } else {
                    $controllerName = $handler;
                    $action = 'index';
                }
                $controllerFQCN = "CareToFund\\Controllers\\$controllerName";

                // Load the controller file if not loaded
                if (!class_exists($controllerFQCN)) {
                    $file = __DIR__ . "/../../Controllers/{$controllerName}.php";
                    if (file_exists($file)) {
                        require_once $file;
                    }
                }

                if (class_exists($controllerFQCN)) {
                    $controllerInstance = new $controllerFQCN();
                    if (method_exists($controllerInstance, $action)) {
                        $controllerInstance->$action();
                    } else {
                        echo "404: Method '$action' not found in controller '$controllerName'";
                    }
                } else {
                    echo "404: Controller '$controllerName' not found.";
                }
                return;
            }
        }
        http_response_code(404);
        echo '404 Not Found';
    }
}
