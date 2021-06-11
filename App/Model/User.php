<?php
    class User extends Entity {
        public $username;
        public $name;
        public $passphrase;
        public $accessLevel;

        function __construct() { 
            $username = '';
            $name = '';
            $passphrase = '';
            $accessLevel = AccessLevel::None;

            parent::setTableName('user');
        }     
    }
?>