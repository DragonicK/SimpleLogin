<?php
    function autoloader($class) {
        require_once('App/Configuration/Builder.php');

        $builder = new Builder();
        $directories = $builder->getDirectories();
    
        foreach($directories as $directory) {
            $dir = __DIR__ . DIRECTORY_SEPARATOR . $directory . DIRECTORY_SEPARATOR;

            if (file_exists($dir . $class . '.php')){
                require_once($dir . $class . '.php');     
            }           
        }
    }

    spl_autoload_register('autoloader');
?>