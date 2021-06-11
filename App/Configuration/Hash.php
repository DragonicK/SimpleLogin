<?php
    class Hash {
        public static function compute($data) {
            return hash('sha256', $data);
        }
    }
?>