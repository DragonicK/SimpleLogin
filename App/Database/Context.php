<?php

    namespace App\Database;

    use App\Model\Entity;

    class Context implements IContext {
        private $connection;
        private $typeof;
        
        function __construct(Connection $connection, $typeof) {
            $this->connection = $connection;
            $this->typeof = $typeof;
        }

        public function exists(int $identity) {
            $table = $this->typeof->getTableName();
            $query = 'SELECT id FROM ' . $table . ' WHERE id = :id LIMIT 1';
 
            $pdo = $this->connection->getPdo();

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id' , $identity);
            $stmt->execute();

            return $stmt->rowCount() == 1 ? true : false;
        }

        public function save(Entity $entity)  {
            $table =  $entity->getTableName();
            $query = '';

            if ($entity->id > 0) {
                $query = 'UPDATE ' . $table . ' SET ';
                $query .= $this->createUpdateQuery($entity);
            }
            else {
                $query = 'INSERT INTO ' . $table . ' ';
                $query .= $this->createInsertQuery($entity);
            }

            $stmt = $this->bindParamFromEntity($query, $entity);
            return $stmt->execute();
        }

        public function delete(Entity $entity) {
            $table =  $entity->getTableName();
            $query = 'DELETE FROM ' . $table . ' WHERE id = :id';

            $pdo = $this->connection->getPdo();

            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':id' , $entity->id);
            $stmt->execute();

            return $stmt->rowCount();
        }

        public function select($options = [], $operators = [], $additional = '') {
            $query = 'SELECT * FROM ' . $this->typeof->getTableName();
            $whereClause = $this->createSelectQuery($options, $operators);

            $query .= ' ' . $whereClause . ' ' . $additional; 

            $stmt = $this->bindParamFromValues($query, $options);
            $stmt->execute();
            $results = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            $objects = [];

            foreach ($results as $result) {
                $objects[] = $this->createEntity($result);
            }
            
            $count = count($objects);
            
            if ($count > 1) {
                return $objects;
            }
            else if ($count == 1) {
                return $objects[0];
            }

            return null;
        }

        private function createEntity(array $object) {
            $reflection = new \ReflectionClass($this->typeof); 
            $entity = $reflection->newInstance();
            $properties = $reflection->getProperties();
          
            foreach($properties as $prop) {
                if (isset($object[$prop->getName()])) {
                    $prop->setValue($entity, $object[$prop->getName()]);
                }
            }
            
            return $entity;
        }

        private function createSelectQuery($options = [], $operators = []) {
            $operator = '';
            $whereClause = '';
            $whereConditions = [];

            if (!empty($options)){
                
                foreach($options as $key => $value) {                      
                    if (isset($operators[$key])) {
                        $operator = $operators[$key];
                    }
                    else {
                        $operator = '';
                    }

                    $this->addToQuery($operator, $key, $whereConditions);
                }

                $whereClause = 'WHERE ' . implode(' ', $whereConditions);
            }

            return $whereClause;
        }

        private function addToQuery($operator, $key, &$whereConditions = []) {
            $operator = strtoupper($operator);

            switch ($operator) {
                case 'LIKE':
                    return $whereConditions[] = $key . ' ' . $operator . ' :' . $key;
                case 'AND':
                    return $whereConditions[] = $operator . ' ' . $key . ' = :' . $key;
                case 'OR':
                    return $whereConditions[] = $operator . ' ' . $key . ' = :' . $key;
                default:
                    return $whereConditions[] = $key . ' = :' . $key;
            }
        }

        private function createInsertQuery(Entity $entity) {
            $properties = $entity->getProperties();

            $fields = '';
            $params = '';
            $query = '';     

            $count = count($properties);

            for ($i = 0; $i < $count; $i++) {
                $object = explode(',', $properties[$i]);

                $fields .= $object[0];
                $params .= ':' . $object[0];

                // Somente adiciona a vírgula se não for o último elemento.
                if ($i < $count - 1) {
                    $fields .= ', ';
                    $params .= ', ';
                }           
            }

            $query = '(' . str_replace(', id', '', $fields) . ') VALUES (' . str_replace(', :id', '', $params) . ')';
      
            return $query;
        }

        private function createUpdateQuery(Entity $entity) {
            $properties = $entity->getProperties();
            $query = '';     

            $count = count($properties);

            for ($i = 0; $i < $count; $i++) {
                $object = explode(',', $properties[$i]);

                $query .= $object[0] . ' = :' . $object[0];   

                // Somente adiciona a vírgula se não for o último elemento.
                if ($i < $count - 1) {
                    $query .= ', ';
                }       
            }

            return str_replace(', id = :id', '', $query) . ' WHERE id = :id LIMIT 1';
        }

        private function bindParamFromEntity(string $query, Entity $entity) {
            $pdo = $this->connection->getPdo();
            $stmt = $pdo->prepare($query);

            $properties = $entity->getPropertiesAndValues();
            $count = count($properties);

            for ($i = 0; $i < $count; $i++) {
                $object = explode(',', $properties[$i]);

                if ( $object[0] != 'id') {
                    $stmt->bindParam(':' . $object[0], $object[1]);  
                }
            }

            return $stmt;
        }

        private function bindParamFromValues(string $query, $params = []) {
            // This is WRONG:
            // "SELECT * FROM `users` WHERE `firstname` LIKE '%:keyword%'";

            // The CORRECT solution is to leave clean the placeholder like this:
            // "SELECT * FROM `users` WHERE `firstname` LIKE :keyword";

            // And then add the percentages to the php variable where you store the keyword:
            // $keyword = "%".$keyword."%";
            // [ 'name' => "%" . 'MyName' ."%", ],

            // https://www.php.net/manual/ja/pdostatement.bindparam.php

            $pdo = $this->connection->getPdo();
            $stmt = $pdo->prepare($query);

            // This works ($val by reference):
            foreach ($params as $key => &$value) {
                $stmt->bindParam(':' . $key, $value);
            }

            // This will fail ($val by value, because bindParam needs &$variable):
            // foreach ($params as $key => $val) {
            //     $sth->bindParam($key, $val);
            // }
            return $stmt;
        }
    }
    
?>