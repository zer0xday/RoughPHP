<?php
require 'App/app.php';
require 'App/router.php';
require 'App/Viewer/Viewer.php';
require 'App/controllers.php';

$app = new App($router);
$app->go();
?>