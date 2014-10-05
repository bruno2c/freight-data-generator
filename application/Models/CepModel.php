<?php

namespace FreightDataGenerator\Application\Models;

use FreightDataGenerator\Application\Core\Models\AbstractModel;

class CepModel extends AbstractModel
{
    protected $validCepRange;

    public function __construct()
    {
        $this->validCepRange = range(10, 99990, 10);
    }

    /**
     * Get a random Cep range
     *
     * @return array[start, final]|null
     */
    public function getCepRange()
    {
        $random = mt_rand(0, 9999);

        if(isset($this->validCepRange[$random])){
            $partialCep = $this->validCepRange[$random];
            unset($this->validCepRange[$random]);

            $sql = sprintf("SELECT MIN(cep) as start, MAX(cep) as final from endereco_completo where cep like '%d%%'", $partialCep);
            $cepRange = $this->fetchRow($sql);

            if(!empty($cepRange['start'])){
                return $cepRange;
            }
        }

        return null;
    }
} 