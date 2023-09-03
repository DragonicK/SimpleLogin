<?php

    namespace App;

    use App\Configurations\DbConfiguration;
    use App\Configurations\AppConfiguration;
    
    class Configuration {
        public function getDatabaseConfiguration() {
            $db = new DbConfiguration();
            $db->host = '127.0.0.1';
            $db->port = 3306;
            $db->userId = 'root';
            $db->passphrase = 'dwHandle';
            $db->database = 'laravel'; 

            return $db;
        }

        public function getAppConfiguration() {
            $app = new AppConfiguration();
            $app->url = 'http://127.0.0.1:7001';
            $app->title = 'Minha Aplicação';

            return $app;
        }

        public function getLanguage(string $language) {
            $dir = __DIR__ . DIRECTORY_SEPARATOR . 'Language' . DIRECTORY_SEPARATOR;
            $namespace = 'App\\Language\\';

            if (file_exists($dir . $language . '.php')){
                $object = $namespace . $language;
                return new $object;               
            }

            $default = $namespace . 'English';                     
            return new $default;
        }

        public function getDirectories() {
            return  [ 
                'Configurations',
                'Database', 
                'Model',
                'Service',
                'Routing',
                'Controller',
                'Language',
                'Security',
                'Core' ];   
        }
    }
    
?>