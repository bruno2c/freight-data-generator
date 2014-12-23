<?php

namespace FreightDataGenerator\Application\Scripts;

use FreightDataGenerator\Application\Core\Scripts\AbstractScript;
use FreightDataGenerator\Application\Helper\QueryHelper;
use FreightDataGenerator\Application\Models\AddressModel;
use FreightDataGenerator\Application\Tables\Address;
use FreightDataGenerator\Application\Helper\NameHelper;

class GenerateAddress extends AbstractScript
{
    public function execute()
    {
        ########################################
        ############ CONFIGURATION #############
        ########################################

        $totalLines = 10000;

        ########################################

        $model = new AddressModel();

        $lastPostcode = $model->getLastPostcode();

        if (!$lastPostcode) {
            $lastPostcode = 0;
        }

        $lastPostcode = explode('-', $lastPostcode);
        $lastPostcode = (int) array_shift($lastPostcode);
        $totalLines += $lastPostcode;

        $stateNameHelper = new NameHelper(BASE_PATH . '/data/words_state.txt');
        $cityNameHelper = new NameHelper(BASE_PATH . '/data/words_city.txt');

        try {
            for ($i = $lastPostcode; $i < $totalLines; $i++) {
                $state = $stateNameHelper->getRandomFromFile();
                $city = $cityNameHelper->getRandomFromFile();

                if (strlen($i) < 5) {
                    $i = str_pad($i, 5, "0", STR_PAD_LEFT);
                }

                if (strlen($i) > 5) {
                    exit('Maximum postcode reached');
                }

                for ($k = 0; $k < 10; $k++) {
                    $postcode = sprintf('%s-%s', $i, str_pad($k."0", 3, "0", STR_PAD_LEFT));

                    if ($model->exists($postcode)) {
                        continue;
                    }

                    $address = new Address();
                    $address->setPostcode($postcode);
                    $address->setCity($city);
                    $address->setState($state);
                    $queryHelper = new QueryHelper($address, 'address');
                    $sql = $queryHelper->getSqlInsertStatement();
                    $model->executeQuery($sql);

                    echo $address->getAddress() . '<br />';
                }

            }
        } catch (\Exception $e) {
            var_dump($e);exit;
        }
    }
}