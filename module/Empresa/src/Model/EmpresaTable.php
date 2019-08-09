<?php

namespace Empresa\Model;

use RuntimeException;
use Zend\Db\TableGateway\TableGatewayInterface;

class EmpresaTable{
    private $tableGateway;

    public function __construct(TableGatewayInterface $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }

    public function fetchAll(){
        return $this->tableGateway->select();
    }

    public function getEmpresa($cnpj){
        $cnpj = (int) $cnpj;
        $rowset = $this->tableGateway->select(['cnpj' => $cnpj]);
        $row = $rowset->current();
        if (! $row) {
            throw new RuntimeException(sprintf(
                'Could not find row with identifier %d',
                $cnpj
            ));
        }

        return $row;
    }

    public function saveEmpresa(Empresa $empresa){
        $data = [
            'CNPJ'           => $empresa->cnpj,
            'nome_fantasia'  => $empresa->nome_fantasia,
            'uf'             => $empresa->uf,
        ];

        $this->tableGateway->insert($data);
    }

    public function deleteEmpresa($cnpj){
        $this->tableGateway->delete(['cnpj' => (int) $cnpj]);
    }
}