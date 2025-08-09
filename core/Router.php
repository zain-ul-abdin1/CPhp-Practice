<?php

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected $routes = [];

    public function add($uri, $controller, $method, $middleware = null)
    {
        $this->routes[] = compact("uri", "controller", "method", "middleware");
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, "GET");
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, "POST");
    }

    public function delete($uri, $controller)
    {
        return $this->add($uri, $controller, "DELETE");
    }

    public function put($uri, $controller)
    {
        return $this->add($uri, $controller, "PUT");
    }

    public function patch($uri, $controller)
    {
        return $this->add($uri, $controller, "PATCH");
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]["middleware"] = $key;
        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
                if ($route["middleware"]) {
                    $middleware = Middleware::MAP[$route["middleware"]];
                    (new $middleware)->handle();
                }

                return require base($route["controller"]);
            }
        }
        $this->abort();
    }
    function abort($code = 404)
    {
        http_response_code($code);
        require base("views/$code.php");
        die();
    }
}
