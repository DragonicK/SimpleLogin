<?php

    namespace App\Service;

    use App\Model\Entity;

    interface IRepository {
        public function save(Entity $entity);
        public function delete(Entity $entity);
        public function exists(int $identity);
        public function find(int $identity);
        public function findAll();
    } 
?>