<?php

    namespace App\Core;

    use App\Model\User;
    use App\Model\AccessLevel;
    use App\Security\Hash;

    class UserFactory {

        public function getUser(string $name, string $username, string $passphrase, string $email) {
            $user = new User();
            $user->id = 0;
            $user->name = $name;
            $user->username = $username;
            $user->passphrase = Hash::compute($passphrase);
            $user->accessLevel = AccessLevel::Normal;
            $user->email = $email;

            return $user;
        }
    }

?>