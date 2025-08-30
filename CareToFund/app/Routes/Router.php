<?php
namespace CareToFund\Routes;
include_once 'app/Middleware/Session.php';

class Router {
    private $currentMiddleware = [];
    private $routes = [];

    public function add($method, $path, $handler) {
        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'handler' => $handler,
            'middleware' => $this->currentMiddleware
        ];
    }

    public function group($options, $callback) {
        $previous = $this->currentMiddleware;
        if (isset($options['middleware'])) {
            // Ensure middleware is always a flat array of strings
            if (is_array($options['middleware'])) {
                $this->currentMiddleware = array_merge($this->currentMiddleware, $options['middleware']);
            } else {
                $this->currentMiddleware[] = $options['middleware'];
            }
        }
        $callback($this);
        $this->currentMiddleware = $previous;
    }

    public function dispatch($method, $uri) {
        foreach ($this->routes as $route) {
            if ($route['method'] === $method && $route['path'] === $uri) {
                // Run middleware if present
                if (!empty($route['middleware'])) {
                    foreach ($route['middleware'] as $middleware) {
                        // Check for global function
                        if (is_string($middleware) && function_exists('\\' . $middleware)) {
                            // echo 'Dispatching middleware: ' . $middleware . '<br>';
                            $middlewareResult = call_user_func('\\' . $middleware);
                            if ($middlewareResult === false) return;
                        }
                        // Check for closures or callable objects
                        elseif (is_callable($middleware)) {
                            $middlewareResult = $middleware();
                            if ($middlewareResult === false) return;
                        }
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
