<?php
    class UserRepository extends Repository {
        function __construct($connection)  {
            $context = new Context($connection, new User());
            parent::__construct($context);             
        }

        public function findByUsername($name) {
            $query = [ 'username' => $name ];
            $empty = [ '' => '' ];

            return $this->context->select($query, $empty, '');
        }
    } 
?>