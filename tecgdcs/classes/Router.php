<?php

namespace Tecgdcs;

class Router
{

    private string $url;

    public function __construct(private array $routes = [],)
    {
        $this->routes = include ROOT_PATH . '/routes.php';
    }
    private function check_route(): array
    {
        foreach ($this->routes as $route) {
            if (in_array(strtolower($this->url), $route) &&
                in_array(strtolower($this->method), $route)) {
                return $route['action'];
            }
        }
        die('route not found');
    }

    public function route()
    {
        $action = $this->check_route();
        $action[0] = new $action[0];
        call_user_func($action);
    }
}