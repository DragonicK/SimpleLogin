<?php

    namespace App\Routing;

    interface IRouter {
        public function add($expression, $function, string $method = 'get');
        public function setErrorPage($expression, $function);
        public function setNotAllowed($expression, $function);
        public function run($basepath, $request, $method);
    }
?>