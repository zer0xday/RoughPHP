<?php
namespace App\Router;

require 'Router\Router.php';
$router = new Router;

$router->get('/', 'AppController#index');
$router->get('/login', 'AppController#login');
$router->post('/login', 'AppController#attemptLogin');