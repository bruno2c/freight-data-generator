<?php

namespace FreightDataGenerator\Application\Core\Models;

abstract class AbstractModel
{
    protected $db;

    protected function fetchAll($sql)
    {
        return mysql_query($sql, \FreightDataGenerator\Config\Database::getInstance()->getConnection());
    }

    protected function fetchRow($sql)
    {
        $resultSet = mysql_query($sql, \FreightDataGenerator\Config\Database::getInstance()->getConnection());

        if($resultSet){
            $rows = mysql_fetch_assoc($resultSet);

            if($rows){
                return $rows;
            }
        } else {
            throw new \RuntimeException(mysql_error());
        }

        return null;
    }

    public function executeQuery($sql)
    {
        return mysql_query($sql, \FreightDataGenerator\Config\Database::getInstance()->getConnection());
    }
}