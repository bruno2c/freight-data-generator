<?php

namespace FreightDataGenerator\Application\Tables;

class FreightCostCarrier
{
    protected $id;
    protected $carrier_id;
    protected $start_cep;
    protected $final_cep;
    protected $state;
    protected $capital;
    protected $start_weight;
    protected $final_weight;
    protected $delivery_time;
    protected $base_freight_cost;
    protected $overweight;
    protected $variable_cost_overweight;
    protected $fixed_cost_overweight;
    protected $overweight_limit;
    protected $target_variable_tax;
    protected $target_variable_tax_min;
    protected $target_variable_tax_max;
    protected $target_fixed_tax;

    /**
     * @param mixed $base_freight_cost
     */
    public function setBaseFreightCost($base_freight_cost)
    {
        $this->base_freight_cost = $base_freight_cost;
    }

    /**
     * @param mixed $capital
     */
    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    /**
     * @param mixed $carrier_id
     */
    public function setCarrierId($carrier_id)
    {
        $this->carrier_id = $carrier_id;
    }

    /**
     * @param mixed $delivery_time
     */
    public function setDeliveryTime($delivery_time)
    {
        $this->delivery_time = $delivery_time;
    }

    /**
     * @param mixed $final_cep
     */
    public function setFinalCep($final_cep)
    {
        $this->final_cep = $final_cep;
    }

    /**
     * @param mixed $final_weight
     */
    public function setFinalWeight($final_weight)
    {
        $this->final_weight = $final_weight;
    }

    /**
     * @param mixed $fixed_cost_overweight
     */
    public function setFixedCostOverweight($fixed_cost_overweight)
    {
        $this->fixed_cost_overweight = $fixed_cost_overweight;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param mixed $overweight
     */
    public function setOverweight($overweight)
    {
        $this->overweight = $overweight;
    }

    /**
     * @param mixed $overweight_limit
     */
    public function setOverweightLimit($overweight_limit)
    {
        $this->overweight_limit = $overweight_limit;
    }

    /**
     * @param mixed $start_cep
     */
    public function setStartCep($start_cep)
    {
        $this->start_cep = $start_cep;
    }

    /**
     * @param mixed $start_weight
     */
    public function setStartWeight($start_weight)
    {
        $this->start_weight = $start_weight;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @param mixed $target_fixed_tax
     */
    public function setTargetFixedTax($target_fixed_tax)
    {
        $this->target_fixed_tax = $target_fixed_tax;
    }

    /**
     * @param mixed $target_variable_tax
     */
    public function setTargetVariableTax($target_variable_tax)
    {
        $this->target_variable_tax = $target_variable_tax;
    }

    /**
     * @param mixed $target_variable_tax_max
     */
    public function setTargetVariableTaxMax($target_variable_tax_max)
    {
        $this->target_variable_tax_max = $target_variable_tax_max;
    }

    /**
     * @param mixed $target_variable_tax_min
     */
    public function setTargetVariableTaxMin($target_variable_tax_min)
    {
        $this->target_variable_tax_min = $target_variable_tax_min;
    }

    /**
     * @param mixed $variable_cost_overweight
     */
    public function setVariableCostOverweight($variable_cost_overweight)
    {
        $this->variable_cost_overweight = $variable_cost_overweight;
    }

    /**
     * @return mixed
     */
    public function getBaseFreightCost()
    {
        if(empty($this->base_freight_cost)){
            $this->base_freight_cost = rand(0, 1000) / rand(1, 20);
        }

        return $this->base_freight_cost;
    }

    /**
     * @return mixed
     */
    public function getCapital()
    {
        return $this->capital;
    }

    /**
     * @return mixed
     */
    public function getCarrierId()
    {
        return $this->carrier_id;
    }

    /**
     * @return mixed
     */
    public function getDeliveryTime()
    {
        if(empty($this->delivery_time)){
            $this->delivery_time = rand(0, 60);
        }

        return $this->delivery_time;
    }

    /**
     * @return mixed
     */
    public function getFinalCep()
    {
        return $this->final_cep;
    }

    /**
     * @return mixed
     */
    public function getFinalWeight()
    {
        if(empty($this->final_weight)){
            $this->final_weight = $this->start_weight + (rand(0, 1000) / rand(1, 20));
        }

        return $this->final_weight;
    }

    /**
     * @return mixed
     */
    public function getFixedCostOverweight()
    {
        if(empty($this->fixed_cost_overweight)){
            $this->fixed_cost_overweight = rand(0, 1000) / rand(1, 20);
        }

        return $this->fixed_cost_overweight;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getOverweight()
    {
        if(empty($this->overweight)){
            $this->overweight = 1;
        }

        return $this->overweight;
    }

    /**
     * @return mixed
     */
    public function getOverweightLimit()
    {
        if(empty($this->overweight_limit)){
            $this->overweight_limit = rand(0, 1000) / rand(1, 20);
        }

        return $this->overweight_limit;
    }

    /**
     * @return mixed
     */
    public function getStartCep()
    {
        return $this->start_cep;
    }

    /**
     * @return mixed
     */
    public function getStartWeight()
    {
        if(empty($this->start_weight)){
            $this->start_weight = rand(0, 1000) / rand(1, 20);
        }

        return $this->start_weight;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return mixed
     */
    public function getTargetFixedTax()
    {
        if(empty($this->target_fixed_tax)){
            $this->target_fixed_tax = rand(0, 1000) / rand(1, 20);
        }

        return $this->target_fixed_tax;
    }

    /**
     * @return mixed
     */
    public function getTargetVariableTax()
    {
        if(empty($this->target_variable_tax)){
            $this->target_variable_tax = 1;
        }

        return $this->target_variable_tax;
    }

    /**
     * @return mixed
     */
    public function getTargetVariableTaxMax()
    {
        if(empty($this->target_variable_tax_max)){
            $this->target_variable_tax_max = $this->target_variable_tax_min + (rand(0, 1000) / rand(1, 20));
        }

        return $this->target_variable_tax_max;
    }

    /**
     * @return mixed
     */
    public function getTargetVariableTaxMin()
    {
        if(empty($this->target_variable_tax_min)){
            $this->target_variable_tax_min = rand(0, 1000) / rand(1, 20);
        }

        return $this->target_variable_tax_min;
    }

    /**
     * @return mixed
     */
    public function getVariableCostOverweight()
    {
        if(empty($this->variable_cost_overweight)){
            $this->variable_cost_overweight = rand(0, 1000) / rand(1, 20);
        }

        return $this->variable_cost_overweight;
    }
}
