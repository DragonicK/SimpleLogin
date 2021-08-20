<?php

    namespace App\Security;

    class Hash {
        public static function compute($data) {
            return hash('sha256', $data);
        }
    }
?>