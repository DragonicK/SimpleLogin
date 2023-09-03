<?php
    
    namespace App\Model;

    class Settings extends Entity {
        public int $user_id;
        public string $theme;
        public string $language;
        
        function __construct() { 
            parent::setTableName('settings');
        } 
    }

?>