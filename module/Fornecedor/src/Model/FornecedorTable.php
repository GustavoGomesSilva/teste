<?php

namespace Fornecedor\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class FornecedorTable{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll(){
        return $this->tableGateway->select();
    }

    public function fetchList($where){
        return $this->tableGateway->select($where);
    }

    public function saveFornecedor(Fornecedor $fornecedor){
        $data = [
            'empresa'           => $fornecedor->empresa,
            'fornecedor'        => $fornecedor->fornecedor,
            'nome'              => $fornecedor->nome,
            'rg'                => $fornecedor->rg,
            'data_nascimento'   => $fornecedor->data_nascimento,
        ];

        $this->tableGateway->insert($data);
    }
}