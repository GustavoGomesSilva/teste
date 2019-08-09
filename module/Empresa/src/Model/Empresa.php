<?php

namespace Empresa\Model;

class Empresa
{
    public $cnpj;
    public $nome_fantasia;
    public $uf;

    public function exchangeArray(array $data){
        $this->cnpj             = !empty($data['CNPJ']) ? $data['CNPJ'] : null;
        $this->nome_fantasia    = !empty($data['NOME_FANTASIA']) ? $data['NOME_FANTASIA'] : null;
        $this->uf               = !empty($data['UF']) ? $data['UF'] : null;
    }

    public function getCnpj(){
        return $this->cnpj;
    }
    
    public function getNomeFantasia(){
        return $this->nome_fantasia;
    }

    public function getUF(){
        return $this->uf;
    }
}