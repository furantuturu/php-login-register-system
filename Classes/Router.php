<?php

namespace Classes;

class Router
{
    private $routes = [];
    public function add($uri, $controller, $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null
        ];

        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post($uri, $controller)
    {
        return $this->add($uri, $controller, 'POST');
    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;

        return $this;
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {
            
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)){

                return require basePath('controllers/' . $route['controller']);

            }

        }

        $this->abort();
    }

    public function abort($httpCode = 404)
    {
        http_response_code($httpCode);

        require basePath("views/{$httpCode}.php");

        die();
    }
}