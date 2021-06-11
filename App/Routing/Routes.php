<?php
    $router = new Router();

    $router->add('/', function() {
        $home = new Home();
        $home->index();
    }, 'get');

    $router->add('/home', function() {
        $home = new Home();
        $home->index();
    }, 'get');

    $router->add('/login', function() {
        $login = new Login();
        $login->index();
    }, 'get');

    $router->add('/index', function() {
        $login = new Login();
        $login->signIn();
    }, 'get');

    $router->add('/signin', function() {
        $login = new Login();
        $login->signIn();
    }, 'post');

    $router->add('/logout', function() {
        $login = new Login();
        $login->signOut();
    }, 'post');

    $router->add('/register', function() {
        $register = new Register();
        $register->index();
    }, 'get');

    $router->add('/signup', function() {
        $register = new Register();
        $register->signUp();
    }, 'post');
?>