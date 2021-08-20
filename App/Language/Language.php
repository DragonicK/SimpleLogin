<?php

    namespace App\Language;

    class Language {
        public string $yes;
        public string $no;
        public string $back;
        public string $loginTitle;
        public string $registerTitle;
        public string $register;
        public string $username;
        public string $email;
        public string $passphrase;
        public string $repeatPassphrase;
        public string $getIn;

        public string $noname;

        public string $loginResponseInput;
        public string $loginResponseDatabase;
        public string $loginResponseInvalid;

        public string $registerCannotBeEmpty;
        public string $registerInvalidCharacter;
        public string $registerPassphraseInvalid;
        public string $registerEmailInvalid;

        public string $registerInvalidInput;
        public string $registerEmailExists;
        public string $registerUsernameExists;
        public string $registerSuccess;

        public static function getLanguageName(string $code) {
            $default = 'English';

            switch ($code) {
                case 'ja': return 'Japanese';
                case 'en': return 'English';
                case 'pt': return 'Portuguese';
            }

            return $default;
        }
    }
?>