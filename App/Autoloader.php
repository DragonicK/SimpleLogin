<?php

    use App\Configuration;

    function autoloader($namespace) {
        require_once('Configuration.php');

        $configuration = new Configuration();
        $directories = $configuration->getDirectories();    

        $class = getClassFromNamespace($namespace);
      
        foreach($directories as $directory) {
            $dir = __DIR__ . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR;
         
            if (file_exists($dir . $class . '.php')){
                require_once($dir . $class . '.php');     
            }   
        }
    }

    function getClassFromNamespace(string $class) {
        $namespaces = explode('\\', $class);
        $count = count($namespaces);
        $last = $count - 1;

        if ($count > 1) {
            $class = $namespaces[$last];
        } 
        
        return $class;
    }

    spl_autoload_register('autoloader');
?>