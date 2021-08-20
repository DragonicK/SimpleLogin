<?php

    namespace App\Model;
    
    class User extends Entity {
        public string $username;
        public string $name;
        public string $passphrase;
        public int $accessLevel;
        public string $language;
        public string $email;

        function __construct() { 
            $username = '';
            $name = '';
            $passphrase = '';
            $accessLevel = AccessLevel::None;
            $email = '';

            parent::setTableName('users');
        }     
    }
?>