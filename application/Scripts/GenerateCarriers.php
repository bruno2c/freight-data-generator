<?php

namespace FreightDataGenerator\Application\Scripts;

use FreightDataGenerator\Application\Core\Scripts\AbstractScript;
use FreightDataGenerator\Application\Helper\QueryHelper;
use FreightDataGenerator\Application\Models\CarrierModel;
use FreightDataGenerator\Application\Tables\Carrier;

class GenerateCarriers extends AbstractScript
{
    public function execute()
    {
        $model = new CarrierModel();

        for ($i = 0; $i < 30; $i++) {
            $carrier = new Carrier();
            $queryHelper = new QueryHelper($carrier, 'carrier');
            $sql = $queryHelper->getSqlInsertStatement();
            $model->executeQuery($sql);

            echo $carrier->getName() . '<br />';
        }
    }
} 