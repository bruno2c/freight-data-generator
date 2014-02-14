<?php

namespace Models;

use Core\Models\AbstractModel;

class CarrierModel extends AbstractModel
{
    public function getRandomCarrierId()
    {
        $sql = "SELECT id FROM carrier ORDER BY RAND() LIMIT 1";
        return $this->fetchRow($sql);
    }
} 