<?php

    namespace App\Core;

    use App\Model\Theme;

    class ThemeFactory {

        public function getTheme(string $theme) {
            switch ($theme) {
                case 'Light':
                    return $this->getLight();
                
                case 'Dark';
                    return $this->getDark();
            }

            return $this->getDefault();
        }

        private function getDefault() {
            $theme = new Theme();
            $theme->name = 'Light';
            $theme->background = '';

            return $theme;
        }

        private function getLight() {
            $theme = new Theme();
            $theme->name = 'Light';
            $theme->background = '';

            return $theme;
        }

        private function getDark() {
            $theme = new Theme();
            $theme->name = 'Dark';
            $theme->background = '';

            return $theme;
        }
    }

?>