<?php

namespace Scripts;

use Core\Scripts\AbstractScript;
use Helper\QueryHelper;
use Models\CarrierModel;
use Tables\Carrier;

class GenerateCarriers extends AbstractScript
{
    public function execute()
    {
        $model = new CarrierModel();

        for ($i = 0; $i < 5; $i++) {
            $carrier = new Carrier();
            $queryHelper = new QueryHelper($carrier, 'carrier');
            $sql = $queryHelper->getSqlInsertStatement();
            $model->executeQuery($sql);

            echo $carrier->getName() . '<br />';
        }
    }
} 