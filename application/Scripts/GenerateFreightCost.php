<?php

namespace FreightDataGenerator\Application\Scripts;

use FreightDataGenerator\Application\Core\Scripts\AbstractScript;
use FreightDataGenerator\Application\Helper\QueryHelper;
use FreightDataGenerator\Application\Models\AddressModel;
use FreightDataGenerator\Application\Models\CarrierModel;
use FreightDataGenerator\Application\Tables\FreightCostCarrier;

class GenerateFreightCost extends AbstractScript
{
    public function execute()
    {
        $model = new AddressModel();
        $carrierModel = new CarrierModel();
        $cepAlreadyUsed = array();

        $totalLines = 50000;
        $linesPerPostcode = 10;
        $forceGeneration = false;
        $weight = 500;
        $maxIteration = $weight * $linesPerPostcode;

        $carrierId = $carrierModel->getRandomCarrierId();
        $ranges = $model->getRangeNotInFreightCost($totalLines);
        $ranges = $model->getRangeNotInFreightCostByCarrier($carrierId['id'], $totalLines);

        foreach ($ranges as $range) {
            for ($i = $weight; $i <= $maxIteration; $i = $i + $weight) {
                $freightCostCarrier = new FreightCostCarrier();
                $freightCostCarrier->setCarrierId($carrierId['id']);
                $freightCostCarrier->setStartCep($range['start']);
                $freightCostCarrier->setFinalCep($range['final']);
                $freightCostCarrier->setCapital($range['city']);
                $freightCostCarrier->setState($range['state']);
                $freightCostCarrier->setStartWeight($i);
                $freightCostCarrier->setFinalWeight($i + 1000);

                $queryHelper = new QueryHelper($freightCostCarrier, 'freight_cost_carrier');
                $sql = $queryHelper->getSqlInsertStatement();
                $model->executeQuery($sql);
            }
        }
    }
} 