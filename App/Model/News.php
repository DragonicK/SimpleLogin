<?php

    namespace App\Model;

    class News extends Entity {
        public string $title;
        public string $subtitle;
        public string $summary;
        public string $news;
        public string $source;
        public string $image;

        function __construct() { 
            parent::setTableName('news');
        } 
    }

?>