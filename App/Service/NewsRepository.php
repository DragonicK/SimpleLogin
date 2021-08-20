<?php

    namespace App\Service;

    use App\MOdel\News;
    use App\Database\Context;
    use App\Database\Connection;

    class NewsRepository extends Repository {
        function __construct(Connection $connection) {
            $context = new Context($connection, new News());
            parent::__construct($context);  
        }

        public function findSingleFromTitle(string $title) {
            $query = [ 'title' => $title ];
            $operators = [ '' => '' ];

            return $this->context->select($query, $operators, 'LIMIT 1');
        }
    
        public function findManyFromLikeTitle(string $title) {
            $query = [ 'title' => '%' . $title . '%' ];
            $operators = [ 'title' => 'LIKE' ];

            return $this->context->select($query, $operators, '');
        }
    }

?>