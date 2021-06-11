<?php
    class Connection {
        public $error = null;
        public $connected = false;

        private $pdo = null;

        function __construct(DbSettings $settings) {
            try {
                $dsn = 'mysql:host=' . $settings->host . ';' . 
                'port=' . $settings->port . ';' . 
                'dbname=' . $settings->database . ';' . 
                'charset=utf8';
        
                $this->pdo = new \PDO($dsn, $settings->userId, $settings->passphrase);
                $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                $this->error = null;
                $this->connected = true;             
            }
            catch (\PDOException $ex) {
                $this->connected = false; 
                $this->error = $ex->getMessage();
            }
        }

        public function getPdo() {
            return $this->pdo;            
        }
    }
?>