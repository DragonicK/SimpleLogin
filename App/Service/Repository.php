<?php  
    class Repository implements IRepository {
        protected IContext $context;

        function __construct(IContext $iContext) {
            $this->context = $iContext;
        }

        public function save($entity) {
            $this->context->save($entity);
        }

        public function delete($entity) {       
            $this->context->delete($entity);
        }

        public function exists($identity) {
            return ($this->find($identity) != null) ? true : false;
        }

        public function find($identity) {
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