<?php
    interface IRepository {
        public function save($entity);
        public function delete($entity);
        public function exists($identity);
        public function find($identity);
        public function findAll();
    } 
?>