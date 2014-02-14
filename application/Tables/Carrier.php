<?php

namespace Tables;

use Helper\NameHelper;

class Carrier 
{
    protected $id;
    protected $cnpj;
    protected $description;
    protected $name;
    /**
     * @var NameHelper
     */
    protected $nameHelper;

    public function __construct()
    {
        $this->nameHelper = new NameHelper(BASE_PATH . '/data/words.txt');
    }

    /**
     * @param mixed $cnpj
     */
    public function setCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return mixed
     */
    public function getCnpj()
    {
        if(empty($this->cnpj)){
            $this->cnpj = $this->nameHelper->getCnpj();
        }

        return $this->cnpj;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        if(empty($this->description)){
            $this->description = $this->nameHelper->getDescription();
        }

        return $this->description;
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

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        if(empty($this->name)){
            $this->name = $this->nameHelper->getCarrierName();
        }

        return $this->name;
    }
} 