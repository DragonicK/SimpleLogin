<?php
    
    namespace App\Controller;

    use App\Configuration;
    use App\Service\UserRepository;
    use App\Model\RegistrationResult;
    use App\Language\Language;

    use App\Core\UserFactory;

    class Register extends Controller {

        function __construct(Configuration $configuration) {
            parent::__construct($configuration);
        }

        public function index() {
            session_start();

            if (isset($_SESSION['id'])) { 
                header("Location: administrator");
            }
            else {
                $config = $this->getAppConfiguration();
                $language = $this->getDefaultLanguage();
                
                $this->view('administrator', 'register', [ 'config' => $config ], $language);
            }
        }

        public function signUp() {
            $data = json_decode(file_get_contents("php://input"));

            $username = filter_var($data->username, FILTER_SANITIZE_STRING);
            $passphrase = filter_var($data->passphrase, FILTER_SANITIZE_STRING); 
            $confirmation = filter_var($data->confirmation, FILTER_SANITIZE_STRING);
            $email = filter_var($data->email, FILTER_SANITIZE_STRING); 

            $language = $this->getDefaultLanguage();
 
            if ($username && $passphrase && $confirmation && $email) {
                if (!$this->isValidPassphrase($passphrase, $confirmation)) {
                    $this->sendReponse(RegistrationResult::PassphraseDoNotMatch, $language);
                    return;
                }
                       
                $connection = $this->getConnection();

                if (!$connection->connected)  {
                    $this->sendReponse(RegistrationResult::Database, $language);
                    return;
                }   

                $repository = new UserRepository($connection);

                if ($this->exists($repository, $username)) {
                    $this->sendReponse(RegistrationResult::UsernameExists, $language);
                    return;
                }

                $factory = new UserFactory();

                $user = $factory->getUser($language->noname, $username, $passphrase, $email);

                if ($repository->save($user)) {  
                    $this->sendReponse(RegistrationResult::Success, $language);
                } 
                else {
                    $this->sendReponse(RegistrationResult::Database, $language);
                }
            }
            else {
                $this->sendReponse(RegistrationResult::Invalid, $language);
            }
        }

        private function exists(UserRepository $repository, string $username) {
            return $repository->findSingleFromUsername($username) != null;
        }

        private function isValidPassphrase(string $passphrase, string $confirmation) {          
            return strcmp($passphrase, $confirmation) == 0;
        }
        
        private function sendReponse(int $status, Language $language) {
            $message = '';

            switch ($status) {
                case RegistrationResult::Success:
                    $message = $language->registerSuccess;
                    break;
                case RegistrationResult::Invalid:
                    $message = $language->registerInvalidInput;
                    break;
                case RegistrationResult::Database:
                    $message = $language->responseDatabase;
                    break;
                case RegistrationResult::EmailExists:
                    $message = $language->registerEmailExists;
                    break;
                case RegistrationResult::UsernameExists:
                    $message = $language->registerUsernameExists;
                    break;
                case RegistrationResult::PassphraseDoNotMatch:
                    $message = $language ->registerPassphraseInvalid;
                    break;                                 
            }

            $response[] = array(
                'status' => $status,
                'message' => $message
            );
            
            echo json_encode($response);
        }
    }
    
?>