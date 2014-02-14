<?php

namespace Scripts;

use Core\Scripts\AbstractScript;
use Helper\QueryHelper;
use Models\CepModel;
use Tables\FreightCostCarrier;

class GenerateFreightCost extends AbstractScript
{
    public function execute()
    {
        $model = new CepModel();
        $cepAlreadyUsed = array();

        for ($n = 0; $n < 10000; $n++) {
            $range = $model->getCepRange();

            if (!empty($range) && !in_array($range['start'], $cepAlreadyUsed)) {
                for ($weight = 500; $weight < 20000; $weight = $weight + 500) {
                    $freightCostCarrier = new FreightCostCarrier();
                    $freightCostCarrier->setCarrierId(2);
                    $freightCostCarrier->setStartCep($range['start']);
                    $freightCostCarrier->setFinalCep($range['final']);
                    $freightCostCarrier->setStartWeight($weight);
                    $freightCostCarrier->setFinalWeight($weight + 1000);

                    $queryHelper = new QueryHelper($freightCostCarrier, 'freight_cost_carrier');
                    $sql = $queryHelper->getSqlInsertStatement();
                    $model->executeQuery($sql);
                }

                $cepAlreadyUsed[] = $range['start'];
            }
        }
    }
} 