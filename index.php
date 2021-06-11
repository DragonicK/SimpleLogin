<?php
    require_once('App/Autoloader.php');
    require_once('App/Routing/Routes.php');

    $request = str_replace('/vue-app', '', $_SERVER['REQUEST_URI']);
    $method = $_SERVER['REQUEST_METHOD'];

    $router->run("/", $request, $method);
?>