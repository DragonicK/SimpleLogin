<?php
    class Login extends Controller {

        public function index() {
            session_start();

            if (isset($_SESSION['id'])) { 
                $user = $this->getUser($_SESSION['id']);

                if ($user != null) {
                    require_once 'resources/view/index.php';
                }
            }
            else {
                require_once 'resources/view/login.php';
            }
        }

        public function signIn() {
            session_start();

            if (isset($_SESSION['id'])) {
                $this->authenticateUsingSession();
            }
            else {
                $this->authenticate();
            }
        }

        public function signOut() {
            session_start();

            if (isset($_SESSION['id'])) { 
                unset($_SESSION['id']);
                
                header('Location: home');
            }
        }

        private function authenticateUsingSession() {

            $user = $this->getUser($_SESSION['id']);

            if ($user != null) {    
                require_once 'resources/view/index.php';
            }
            else {
                $this->sendReponse(AuthenticationResult::Invalid);
            }
        }

        private function authenticate() {
            $data = json_decode(file_get_contents("php://input"));
       
            $username = filter_var($data->username, FILTER_SANITIZE_STRING);
            $passphrase = filter_var($data->passphrase, FILTER_SANITIZE_STRING); 

            if ($username && $passphrase) {
                $connection = $this->getConnection();

                if ($connection->connected) {
                    $repository = new UserRepository($connection);
                    $user = $repository->findByUsername($username);

                    if ($this->isValidPassphrase($user, $passphrase)) {
                        $this->setSession($user);
                        $this->sendReponse(AuthenticationResult::Sucess);
                    }
                    else {
                        $this->sendReponse(AuthenticationResult::Invalid);
                    }
                }
                else {
                    $this->sendReponse(AuthenticationResult::Database);
                }
            }
            else {
                $this->sendReponse(AuthenticationResult::Input);
            }
        }

        private function getUser($id) {
            if ($id > 0) {
                $connection = $this->getConnection();
                $repository = new UserRepository($connection);
                return $repository->find($id);
            }

            return null;
        }

        private function setSession($user) {
            $_SESSION['id'] = $user->id;
        }

        private function isValidPassphrase($user, $passphrase) {
            if ($user != null) {
                $hash =  Hash::compute($passphrase);
               
                if (strcmp($hash, $user->passphrase) != 0) {
                    return false;
                }          
            }
            else {
                return false;
            }

            return true;
        }

        private function sendReponse($status) {
            $response[] = array('status' => $status);
            echo json_encode($response);
        }
    }
?>