<?php

namespace FreightDataGenerator\Application\Tables;

use FreightDataGenerator\Application\Helper\NameHelper;

class Address 
{
    protected $id;
    protected $address;
    protected $neighborhood;
    protected $city;
    protected $state;
    protected $postcode;

    /**
     * @var NameHelper
     */
    protected $nameHelper;

    public function __construct()
    {
        $this->nameHelper = new NameHelper(BASE_PATH . '/data/words_street.txt');
    }

    public function setNeighborhood($neighborhood)
    {
        $this->neighborhood = $neighborhood;
    }

    public function getNeighborhood()
    {
        if (!$this->neighborhood) {
            $nameHelper = new NameHelper(BASE_PATH . '/data/words_neighborhood.txt');
            $this->neighborhood = $nameHelper->getRandomFromFile();
        }

        return $this->neighborhood;
    }

    public function setCity($city)
    {
        $this->city = $city;
    }

    public function getCity()
    {
        if (!$this->city) {
            $nameHelper = new NameHelper(BASE_PATH . '/data/words_city.txt');
            $this->city = $nameHelper->getRandomFromFile();
        }

        return $this->city;
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function getState()
    {
        if (!$this->state) {
            $nameHelper = new NameHelper(BASE_PATH . '/data/words_state.txt');
            $this->state = $nameHelper->getRandomFromFile();
        }

        return $this->state;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = $postcode;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        if(empty($this->address)){
            $this->address = $this->nameHelper->getAddress();
        }

        return $this->address;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}