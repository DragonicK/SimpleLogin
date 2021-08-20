<?php

    namespace App\Model;
    
    abstract class AccessLevel {
        const None = 0;
        const Normal = 1;
        const Administrator = 2;
        const Superior = 3;
    }
?>