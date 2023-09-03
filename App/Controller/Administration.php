<?php

    namespace App\Controller;

    use App\Configuration;
    use App\Security\Hash;
    use App\Language\Language;
    use App\Model\AuthenticationResult;
    use App\Service\UserRepository;

    class Administration extends Controller {

        function __construct(Configuration $configuration) {
            parent::__construct($configuration);
        }

        public function index() {
            session_start();
     
            $user = $this->getUserFromSession();

            if ($user != null) {
                header('Location: dashboard');
            }
            else {
                $config = $this->getAppConfiguration();
                $language = $this->getDefaultLanguage();

                $this->view('administrator', 'login', [ 'config' => $config ], $language);
            }
        }

        public function signIn() {
            session_start();

            if (isset($_SESSION['id'])) {
                $this->authenticateSession();
            }
            else {
                $this->authenticate();
            }
        }

        public function signOut() {
            session_start();

            $this->unsetSession(); 

            header('Location: administrator');
        }

        private function authenticateSession() {
            $user = $this->getUserFromSession();           

            if ($user != null) {
                header('Location: dashboard');
            }
            else {
                $config = $this->getAppConfiguration();
                $language = $this->getDefaultLanguage();
                $this->view('administrator', 'login', [ 'config' => $config ], $language);
            }
        }

        private function authenticate() {
            $language = $this->getDefaultLanguage();

            $data = json_decode(file_get_contents("php://input"));
       
            $username = filter_var($data->username, FILTER_SANITIZE_STRING);
            $passphrase = filter_var($data->passphrase, FILTER_SANITIZE_STRING); 

            if ($username && $passphrase) {
                $connection = $this->getConnection();

                if ($connection->connected) {
                    $repository = new UserRepository($connection);
                    $user = $repository->findSingleFromUsername($username);

                    if ($this->isValidPassphrase($user, $passphrase)) {
                        $this->setSession($user);
                        $this->sendReponse(AuthenticationResult::Sucess, $language);
                    }
                    else {
                        $this->sendReponse(AuthenticationResult::Invalid, $language);
                    }
                }
                else {
                    $this->sendReponse(AuthenticationResult::Database, $language);
                }
            }
            else {
                $this->sendReponse(AuthenticationResult::Input, $language);
            }
        }

        private function getUserFromSession() {
            if (isset($_SESSION['id'])) {  
                $id = $_SESSION['id'];

                if ($id > 0) {
                    $connection = $this->getConnection();
                    $repository = new UserRepository($connection);
    
                    return $repository->find($id);
                }
            }

            return null;
        }

        private function setSession($user) {
            $_SESSION['id'] = $user->id;
        }

        private function unsetSession() {
            if (isset($_SESSION['id'])) { 
                unset($_SESSION['id']);
            }
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

        private function sendReponse($status, Language $language) {
            $message = '';

            if ($status == AuthenticationResult::Input) {
                $message = $language ->loginResponseInput;
            }
            else if($status == AuthenticationResult::Database) {
                $message = $language ->responseDatabase;
            }
            else if($status == AuthenticationResult::Invalid) {
                $message = $language ->loginResponseInvalid;         
            }   

            $response[] = array(
                'status' => $status,
                'message' => $message
            );
            
            echo json_encode($response);
        }

    }
    
?>