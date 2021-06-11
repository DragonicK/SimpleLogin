<?php
    class Builder {
        public function getDatabaseSettings() {
            $db = new DbSettings();
            $db->host = '127.0.0.1';
            $db->port = 3306;
            $db->userId = 'root';
            $db->passphrase = 'dwHandle';
            $db->database = 'laravel'; 

            return $db;
        }

        public function getAppSettings() {
            $settings = new AppSettings();
            $settings->url = 'http://187.95.7.140:7001/vue-app/';
            $settings->title = 'Minha Aplicação';

            return $settings;
        }

        public function getDirectories() {
            return  [ 
                'Configuration',
                'Database', 
                'Model',
                'Service',
                'Routing',
                'Controller' ];   
        }
    }
?>