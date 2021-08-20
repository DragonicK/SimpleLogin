<?php

    namespace App\Database;

    use App\Configurations\DbConfiguration;

    class Connection {
        public $error = null;
        public $connected = false;

        private $pdo = null;

        function __construct(DbConfiguration $dbConfiguration) {
            try {
                $dsn = 'mysql:host=' . $dbConfiguration->host . ';' . 
                'port=' . $dbConfiguration->port . ';' . 
                'dbname=' . $dbConfiguration->database . ';' . 
                'charset=utf8';

                $this->pdo = new \PDO($dsn, $dbConfiguration->userId, $dbConfiguration->passphrase);
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