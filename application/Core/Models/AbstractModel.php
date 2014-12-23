<?php

namespace FreightDataGenerator\Application\Core\Models;

abstract class AbstractModel
{
    protected $db;

    protected function fetchAll($sql)
    {
        $pdo = \FreightDataGenerator\Config\Database::getInstance()->getConnection();
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }

    protected function fetchRow($sql)
    {
        $pdo = \FreightDataGenerator\Config\Database::getInstance()->getConnection();
        $statement = $pdo->prepare($sql);
        $statement->execute();
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    public function executeQuery($sql)
    {
        $pdo = \FreightDataGenerator\Config\Database::getInstance()->getConnection();
        return $pdo->query($sql);
    }
}