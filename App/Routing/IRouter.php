<?php
    interface IRouter {
        public function add($expression, $function, $method = 'get');
        public function setErrorPage($expression, $function);
        public function setNotAllowed($expression, $function);
        public function run($basepath, $request, $method);
    }
?>