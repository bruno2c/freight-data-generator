<?php

namespace FreightDataGenerator\Application\Models;

use FreightDataGenerator\Application\Core\Models\AbstractModel;

class AddressModel extends AbstractModel
{
	/**
     * Verify if postcode exists
     *
     * @return bool
     */
    public function exists($postcode)
    {
        $sql = sprintf("SELECT postcode FROM address WHERE postcode = '%s'", $postcode);
        $result = $this->fetchRow($sql);

        if(isset($result['postcode'])){
            return true;
        }

        return false;
    }

    public function getLastPostcode()
    {
        $sql = "SELECT postcode FROM address ORDER BY 1 DESC LIMIT 1";
        $result = $this->fetchRow($sql);

        if(isset($result['postcode'])){
            return $result['postcode'];
        }

        return false;
    }

    public function getRangeNotInFreightCost($limit = null)
    {
        $sql = "
            SELECT MIN(a.postcode) start, MAX(a.postcode) final, a.city, a.state, SUBSTRING_INDEX(a.postcode, '-', 1) AS short_postcode
            FROM address a 
            LEFT JOIN freight_cost_carrier fcc ON fcc.start_cep = a.postcode 
            WHERE fcc.id IS NULL 
            GROUP BY short_postcode
        ";

        if ($limit > 0) {
            $sql .= sprintf(" LIMIT %s", $limit);
        }

        $result = $this->fetchAll($sql);

        return $result;
    }

    public function getRangeNotInFreightCostByCarrier($carrierId, $limit = null)
    {
        $sql = sprintf("
            SELECT MIN(a.postcode) start, MAX(a.postcode) final, a.city, a.state, SUBSTRING_INDEX(a.postcode, '-', 1) AS short_postcode
            FROM address a 
            LEFT JOIN freight_cost_carrier fcc ON fcc.start_cep = a.postcode AND fcc.carrier_id = %s 
            WHERE fcc.id IS NULL 
            GROUP BY short_postcode
        ", $carrierId);

        if ($limit > 0) {
            $sql .= sprintf(" LIMIT %s", $limit);
        }

        $result = $this->fetchAll($sql);

        return $result;
    }
}