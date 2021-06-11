<?php
    interface IContext {
        public function save($entity);
        public function delete($entity);
        public function select($options = [], $operators = [], $additional = '');
    } 
?>