<?php
namespace CareToFund\Controllers;

class Router {
    private $currentMiddleware = [];

    //process sa pagkuha ng routes
    private $routes = [];

    public function add($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
            'middleware' => $this->currentMiddleware
        ];
    }
    // Middleware group support para hindi na lagi i se set paulit ulit sa bawat route
    public function group($options, $callback) {
        $previous = $this->currentMiddleware;
        if (isset($options['middleware'])) {
            $this->currentMiddleware[] = $options['middleware'];
        }
        $callback($this);
        $this->currentMiddleware = $previous;
    }
    
    //process sa pagbuo ng routes and execution
    public function dispatch($method, $uri) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                // Run middleware if meron siyempre
                foreach ($route['middleware'] as $middleware) {
                    if (is_callable($middleware)) {
                        $result = $middleware();
                        if ($result === false) return;
                    } elseif (is_string($middleware) && function_exists($middleware)) {
                        $result = $middleware();
                        if ($result === false) return;
                    }
                }

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
