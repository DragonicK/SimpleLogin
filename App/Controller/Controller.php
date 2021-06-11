<?php
    class Controller {
        protected function getConnection() {
            $builder = new Builder();
            $settings = $builder->getDatabaseSettings();
            
            return new Connection($settings);
        }
    }
?>