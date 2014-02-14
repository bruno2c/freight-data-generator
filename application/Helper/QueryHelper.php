<?php
/**
 * Created by PhpStorm.
 * User: debiandev
 * Date: 2/12/14
 * Time: 10:20 PM
 */

namespace Helper;

class QueryHelper 
{
    protected $object;
    protected $tableName;

    /**
     * @param $object
     * @param $tableName
     */
    public function __construct($object, $tableName)
    {
        $this->object = $object;
        $this->tableName = $tableName;
    }

    /**
     * Build a insert sql statement based on $this->object properties and values
     * @return string
     */
    public function getSqlInsertStatement()
    {
        $reflection = new \ReflectionClass($this->object);

        $fields = "";
        $values = "";

        foreach($reflection->getProperties() as $property){
            if($property->getName() == 'id'){
                continue;
            }

            $get = "get".str_replace(' ', '', ucwords(str_replace('_', '', $property->getName())));

            if(method_exists($this->object, $get)){
                $fields .= $property->getName() . ", ";
                $values .= "'" . $this->object->$get() . "', ";
            }
        }

        $fields = substr($fields, 0, -2);
        $values = substr($values, 0, -2);

        $sql = "INSERT INTO {$this->tableName} ({$fields}) VALUES ($values)";

        return $sql;
    }
} 