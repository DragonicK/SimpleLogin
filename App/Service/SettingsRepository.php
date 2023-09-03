<?php

    namespace App\Service;

    use App\Model\Settings;
    use App\Database\Context;
    use App\Database\Connection;

    class SettingsRepository extends Repository {
        function __construct(Connection $connection) {
            $context = new Context($connection, new Settings());
            parent::__construct($context);  
        }

        public function findFromUserId(int $user_id) {
            $query = [ 'user_id' => $user_id ];
            $operators = [ '' => '' ];

            return $this->context->select($query, $operators, 'LIMIT 1');
        }

    }

?>