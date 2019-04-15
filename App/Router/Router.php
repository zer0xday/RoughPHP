<?php
namespace App\Router;

class Router {
    public $GET = [];
    public $POST = [];

    // push to array GET route
    public function get($routeName, $controller) {
        return $this->GET[$this->new($routeName)] = $controller;
    }

    // push to array POST route
    public function post($routeName, $controller) {
        return $this->POST[$this->new($routeName)] = $controller;
    }

    // create new prepared Route
    public function new($routeName) {
        return $this->formatRoute($routeName);
    }

    // Format route to "/sample"
    public function formatRoute($routeName) {
        if(strpos($routeName, '/') !== false) {
            return $routeName;
        }
        return '/'.$routeName;
    }
}
