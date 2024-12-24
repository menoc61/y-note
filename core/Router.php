<?php
namespace App\Core;

class Router {
    private $routes = [];
    private $middlewares = [];

    public function get($uri, $handler) {
        $this->routes['GET'][$uri] = $handler;
    }

    public function post($uri, $handler) {
        $this->routes['POST'][$uri] = $handler;
    }

    public function before($uri, $middleware) {
        $this->middlewares[$uri] = $middleware;
    }

    public function run() {
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        // Apply middleware
        foreach ($this->middlewares as $route => $middleware) {
            if ($uri === $route) {
                $middleware();
            }
        }

        // Handle routes
        if (isset($this->routes[$method][$uri])) {
            $handler = $this->routes[$method][$uri];
            $controller = new $handler[0]();
            $method = $handler[1];
            $controller->$method();
        } else {
            // Handle 404 Not Found
            http_response_code(404);
            echo "404 Not Found";
        }
    }
}