<?php

    namespace App\Controller;

    use App\Configuration;
    use App\Language\Language;
    use App\Database\Connection;

    class Controller {
        protected Configuration $configuration;
   
        function __construct(Configuration $configuration) {
            $this->configuration = $configuration;
        }

        protected function getAppConfiguration() {
            return $this->configuration->getAppConfiguration();
        }

        protected function getConnection() {
            $db = $this->configuration->getDatabaseConfiguration();

            return new Connection($db);
        }

        protected function getDefaultLanguage() {
            $code = substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            $name = Language::getLanguageName($code);

            return $this->getLanguage($name);
        }

        protected function getLanguage(string $name) {
            return $this->configuration->getLanguage($name);
        }

        protected function view(string $folder, string $view, array $content, Language $language) {
            $resources = 'resources' . DIRECTORY_SEPARATOR . 'view' . DIRECTORY_SEPARATOR;

            if (strlen($folder) > 0) {
                require_once $resources . $folder . DIRECTORY_SEPARATOR . $view . '.php';
            }
            else {
                require_once $resources . $view . '.php';
            }
        }
    }
    
?>