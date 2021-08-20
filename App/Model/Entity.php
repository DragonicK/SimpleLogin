<?php

    namespace App\Model;

    class Entity {
        public $id;
        
        private static $tableName;

        public function getProperties() {   
            $reflector = new \ReflectionClass($this);
            $properties = $reflector->getProperties(\ReflectionProperty::IS_PUBLIC);   
            $mapped = [];   

            foreach($properties as $property) {
                $mapped[] = $property->getName();
            }

            return $mapped;
        }

        public function getPropertiesAndValues() {
            $reflector = new \ReflectionClass($this);
            $properties = $reflector->getProperties(\ReflectionProperty::IS_PUBLIC);   
            $mapped = [];
            
            foreach($properties as $property) {
                $mapped[] = $property->getName() . ",". $this->{$property->getName()};
            }

            return $mapped;
        }

        public static function setTableName(string $name) {
            self::$tableName = strtolower($name);
        }

        public static function getTableName() {
            return self::$tableName;
        }
    }
?>