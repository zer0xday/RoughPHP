<?php
session_start();
require 'App/App.php';
require 'App/routes.php';
require 'App/controllers.php';
require 'App/middlewares.php';

$app = new App($router);
$app->go();

?>