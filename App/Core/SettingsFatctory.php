<?php

    namespace App\Core;

    use App\Model\Settings;

    class SettingsFatctory {

        public function getSettings(int $userId) {
            $settings = new Settings();
            $settings->user_id = $userId;
            $settings->theme = 'Light';
            $settings->language = 'English';

            return $settings;
        }
    }

?>