<?php

    namespace App\Controller;

    use App\Configuration;
    use App\Core\SettingsFatctory;
    use App\Model\Settings;
    use App\Service\UserRepository;
    use App\Service\SettingsRepository;

    class Dashboard extends Controller {
        function __construct(Configuration $configuration) {
            parent::__construct($configuration);
        }

        public function index() {
            session_start();

            $user = $this->getUserFromSession();

            if ($user != null) {
                $config = $this->getAppConfiguration();       
                $settings = $this->getUserSettings($user->id);

                if ($settings == null){
                    $factory = new SettingsFatctory();
                    $settings = $factory->getSettings($user->id);

                    $this->saveUserSettings($settings);
                }

                $language = $this->getLanguage($settings->language);

                $content = [
                    'user' => $user,
                    'config' => $config,
                    'settings' => $settings
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

        private function getUserSettings(int $userId) {
            $connection = $this->getConnection();
            $repository = new SettingsRepository($connection);

            return $repository->findFromUserId($userId);
        }
        
        private function saveUserSettings(Settings $settings) {
            $connection = $this->getConnection();        
            $repository = new SettingsRepository($connection);

            $repository->save($settings);
        }
    }
    
?>