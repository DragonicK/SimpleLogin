<?php

    namespace App\Service;

    use App\Model\User;
    use App\Database\Connection;
    use App\Database\Context;

    class UserRepository extends Repository {
        function __construct(Connection $connection)  {
            $context = new Context($connection, new User());
            parent::__construct($context);             
        }

        public function findSingleFromUsername(string $name) {
            $query = [ 'username' => $name ];
            $operators = [ '' => '' ];

            return $this->context->select($query, $operators, 'LIMIT 1');
        }

    } 
    
?>