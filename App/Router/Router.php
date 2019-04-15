<?php
namespace App\Router;

class Router {
    public $GET = [];
    public $POST = [];

    public function get($routeName, $controller) {
        return $this->GET[$this->new($routeName)] = $controller;
    }

    public function post($routeName, $controller) {
        return $this->POST[$this->new($routeName)] = $controller;
    }

    public function new($routeName) {
        return $this->formatRoute($routeName);
    }

    public function formatRoute($routeName) {
        if(strpos($routeName, '/') !== false) {
            return $routeName;
        } else {
            return '/'.$routeName;
        }
    }
}
