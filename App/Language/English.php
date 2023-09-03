<?php

    namespace App\Language;

    class English extends Language {

        function __construct() {
            $this->yes = 'Yes';
            $this->no = 'No';
            $this->back = 'Back';
            $this->loginTitle = 'Administrator Panel';
            $this->registerTitle = 'Registration Panel';
            $this->register = 'Register';
            $this->username = 'Username';
            $this->email = 'Email';
            $this->passphrase = 'Passphrase';
            $this->repeatPassphrase = 'Confirm Passphrase';
            $this->getIn = 'Login';

            $this->noname = 'No Name';

            $this->responseDatabase = 'Failed to connect to database';
            
            $this->loginResponseInput = 'Invalid information in username or passphrase';
            $this->loginResponseInvalid = 'Incorrect username or passphrase';   

            $this->registerCannotBeEmpty = 'Cannot be empty';
            $this->registerInvalidCharacter = 'Contains invalid characters';
            $this->registerPassphraseInvalid = 'Passphrase do not match';
            $this->registerEmailInvalid = 'Insert a valid email';
            
            $this->registerInvalidInput = 'Invalid data provided';
            $this->registerEmailExists = 'The email is already registered for another username';
            $this->registerUsernameExists = 'This username is already registered';
            $this->registerSuccess = 'The username is now registered';
        }
    }
    
?>