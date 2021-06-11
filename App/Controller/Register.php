<?php
    class Register extends Controller {

        public function index() {
            session_start();

            if (isset($_SESSION['id'])) { 
                header("Location: index");
            }
            else {
                require_once 'resources/view/register.php';
            }
        }

        public function signUp() {
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $passphrase = filter_input(INPUT_POST, 'passphrase', FILTER_SANITIZE_STRING);
 
            if ($username && $passphrase) {
                $connection = $this->getConnection();
                $repository = new UserRepository($connection);

                $user = $repository->findByUsername($username);

                if ($user == null) {
                    $user = new User();
                    $user->id = 0;
                    $user->name = $username;
                    $user->username = $username;
                    $user->passphrase = Hash::compute($passphrase);
                    $user->accessLevel = AccessLevel::Normal;
    
                    $repository->save($user);   
                    $this->showSuccessMessage("The user is now registered");  
                }
                else {
                    $this->showErrorMessage("Username already taken");
                }   
            }
            else {
                $this->showErrorMessage("Invalid Input");
            }
        }

        private function showSuccessMessage($message) {
            echo "<script>alert('" . $message ."');</script>";
            require_once 'resources/view/home.php';
        }

        private function showErrorMessage($message) {
            echo "<script>alert('" . $message ."');</script>";
            require_once 'resources/view/register.php';
        }
    }
?>