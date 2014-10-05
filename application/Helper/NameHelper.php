<?php

namespace FreightDataGenerator\Application\Helper;

class NameHelper 
{
    protected $fileData;
    protected $fileDataArray;

    public function __construct($filepath)
    {
        if(file_exists($filepath)){
            $this->fileData = file_get_contents($filepath);
            $this->fileDataArray = explode(';', $this->fileData);
        }
    }

    public function getCarrierName()
    {
        $maxRand = count($this->fileDataArray);
        return $this->fileDataArray[mt_rand(0, $maxRand - 1)] . " Carrier LTDA";
    }

    public function getCnpj()
    {
        return mt_rand(10, 99).".".mt_rand(100, 999).".".mt_rand(100, 999)."/".mt_rand(1000, 9999)."-".mt_rand(10, 99);
    }

    public function getDescription()
    {
        $description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. In purus lacus, accumsan vitae urna et,
         hendrerit aliquet nisl. Phasellus pellentesque sollicitudin facilisis. Vivamus vulputate quis lectus sit amet
         consequat. In at ipsum id quam euismod dapibus. Duis convallis lobortis nibh, quis scelerisque lacus
         consectetur quis. Phasellus dignissim libero eu quam commodo, sit amet blandit diam sagittis. Nullam ac
         commodo ipsum. Interdum et malesuada fames ac ante ipsum primis in faucibus.";

        return $description;
    }
} 