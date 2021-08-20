<?php

    namespace App\Controller;

    use App\Configuration;
    use App\Service\UserRepository;

    class Dashboard extends Controller {
        function __construct(Configuration $configuration) {
            parent::__construct($configuration);
        }

        public function index() {
            session_start();

            $user = $this->getUserFromSession();

            if ($user != null) {
                $config = $this->getAppConfiguration();
                $language = $this->getLanguage($user->language);

                $content = [
                    'user' => $user,
                    'config' => $config
                ];

                $this->view('administrator', 'dashboard', $content, $language);
            }
            else {
                header('Location: administrator');
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
    }
?>