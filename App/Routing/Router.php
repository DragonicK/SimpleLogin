<?php

    // https://steampixel.de/simple-and-elegant-url-routing-with-php/

    namespace App\Routing;

    class Router implements IRouter {
        private $routes = Array();
        private $errorPage = null;
        private $notAllowed = null;

        public function add($expression, $function, string $method = 'get') {
            array_push($this->routes,
                array('expression' => $expression,
                      'function' => $function,
                      'method' => $method)
            );
        }

        public function setErrorPage($expression, $function) {
            $this->errorPage = array(
                'expression' => $expression,
                'function' => $function
            );
        }

        public function setNotAllowed($expression, $function) {
            $this->notAllowed = array(
                'expression' => $expression,
                'function' => $function
            );
        }

        public function run($basepath, $request, $method) {
            $parsed_url = parse_url($request); 

            if(isset($parsed_url['path'])) {
                $path = $parsed_url['path'];
            }else{
                $path = '/';
            }

            foreach ($this->routes as $route) {
                // Add basepath to matching string
                if($basepath != '' && $basepath != '/') {
                    $route['expression'] = '('.$basepath.')'.$route['expression'];
                }

                // Add 'find string start' automatically
                // Add 'find string end' automatically
                $route['expression'] = '^'.$route['expression'].'$';
                
                $path_match_found = false;
                $route_match_found = false;

                // Check path match	
                if(preg_match('#'.$route['expression'].'#', $path, $matches)) {
                    $path_match_found = true;

                    // Check method match
                    if(strtolower($method) == strtolower($route['method'])) {
                        // Always remove first element. This contains the whole string
                        array_shift($matches);
                        
                        // Remove basepath
                        if($basepath != '' && $basepath != '/'){
                            array_shift($matches);
                        }
                        
                        call_user_func_array($route['function'], $matches);

                        $route_match_found = true;

                        // Do not check other routes
                        break;
                    }
                }
            }

            // No matching route was found
            if (!$route_match_found) {
                // But a matching path exists
                if($path_match_found) {
                    $this->methodNotAllowed($path, $method);
                }
                else{
                    $this->pageNotFound($path);
                }
            }
        }

        private function methodNotAllowed($path, $method) {
            header("HTTP/1.0 405 Method Not Allowed");
            
            if($this->notAllowed){
                call_user_func_array($this->notAllowed, Array($path, $method));
            }
        }

        private function pageNotFound($path) {
            header("HTTP/1.0 404 Not Found");
            
            if ($this->errorPage) {
                call_user_func_array($this->errorPage, Array($path));
            }
        }
    }
    
?>