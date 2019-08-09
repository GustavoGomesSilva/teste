<?php

namespace Fornecedor\Model;

class Fornecedor
{
    public $empresa;
    public $fornecedor;
    public $nome;
    public $rg;
    public $data_nascimento;

    public function exchangeArray(array $data){
        $this->empresa          = !empty($data['EMPRESA']) ? $data['EMPRESA'] : null;
        $this->fornecedor       = !empty($data['FORNECEDOR']) ? $data['FORNECEDOR'] : null;
        $this->nome             = !empty($data['NOME']) ? $data['NOME'] : null;
        $this->rg               = !empty($data['RG']) ? $data['RG'] : null;
        $this->data_nascimento  = !empty($data['DATA_NASCIMENTO']) ? $data['DATA_NASCIMENTO'] : null;
        $this->data_cadastro    = !empty($data['DATA_CADASTRO']) ? $data['DATA_CADASTRO'] : null;
    }
}