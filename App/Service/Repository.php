<?php  

    namespace App\Service;

    use App\Model\Entity;
    use App\Database\IContext;

    class Repository implements IRepository {
        protected IContext $context;

        function __construct(IContext $iContext) {
            $this->context = $iContext;
        }

        public function save(Entity $entity) {
            return $this->context->save($entity);
        }

        public function delete(Entity $entity) {       
            return $this->context->delete($entity);
        }

        public function exists(int $identity) {
            return $this->context->exists($identity);
        }

        public function find(int $identity) {
            $query = [ 'id' => $identity ];
            $empty = [ '' => '' ];

            return $this->context->select($query, $empty, 'LIMIT 1');
        }

        public function findAll() {
            $empty = [ '' => ''];

            return $this->context->select($empty, $empty);
        }
    }
    
?>