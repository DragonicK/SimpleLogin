<?php

    namespace App\Database;

    use App\Model\Entity;

    interface IContext {
        public function exists(int $identity);
        public function save(Entity $entity);
        public function delete(Entity $entity);
        public function select($options = [], $operators = [], $additional = '');
    } 
    
?>