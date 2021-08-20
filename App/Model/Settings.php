<?php
    
    namespace App\Model;

    class Settings extends Entity {
        public int $user_id;
        
        function __construct() { 
            parent::setTableName('settings');
        } 
    }

?>