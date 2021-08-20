<?php

    namespace App\Model;

    class News extends Entity {
        public string $title;

        function __construct() { 
            parent::setTableName('news');
        } 
    }

?>