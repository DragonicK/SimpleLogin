<?php

    namespace App\Model;
    
    abstract class RegistrationResult {
        const Success = 0;
        const Invalid = 1;
        const Database = 2;
        const EmailExists = 3;
        const UsernameExists = 4;
        const PassphraseDoNotMatch = 5;
    }
    
?>