<?php

    namespace App\Routing;

    use App\Configuration;
    use App\Controller\Dashboard;
    use App\Controller\Register;
    use App\Controller\Administration;

    $router = new Router();

    $router->add('/', function() {
        $admin = new Administration(new Configuration());
        $admin->index();
    }, 'get');

    // View login page.
    $router->add('/administrator', function() {
        $admin = new Administration(new Configuration());
        $admin->index();
    }, 'get');

    // Sign in.
    $router->add('/signin', function() {
        $admin = new Administration(new Configuration());
        $admin->signIn();
    }, 'post');

    // Logout.
    $router->add('/signout', function() {
        $admin = new Administration(new Configuration());
        $admin->signOut();
    }, 'post');

    $router->add('/dashboard', function() {
        $board = new Dashboard(new Configuration());
        $board->index();
    }, 'get');

    $router->add('/register', function() {
        $board = new Register(new Configuration());
        $board->index();
    }, 'get');

    $router->add('/signup', function() {
        $board = new Register(new Configuration());
        $board->signUp();
    }, 'post');

?>