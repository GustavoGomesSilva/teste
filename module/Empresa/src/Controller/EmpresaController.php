<?php

namespace Empresa\Controller;

use Empresa\Model\EmpresaTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Empresa\Form\EmpresaForm;
use Empresa\Model\Empresa;

class EmpresaController extends AbstractActionController
{
    private $table;

    public function __construct(EmpresaTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'empresas' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
        $form = new EmpresaForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['estados' => $this->getEstados()];
        }

        $empresa = new Empresa();
        $form->setData($request->getPost());

        
        if (! $form->isValid()) {
            return ['estados' => $this->getEstados()];
        }        

        $empresa->exchangeArray($form->getData());
        $this->table->saveEmpresa($empresa);

        return $this->redirect()->toRoute('empresa');
    }

    public function editAction()
    {
    }

    public function deleteAction()
    {
    }

    public function getEstados(){
        $estados = array();

        $estados['AC'] = 'Acre';
        $estados['AL'] = 'Alagoas';
        $estados['AP'] = 'Amapá';
        $estados['AM'] = 'Amazonas';
        $estados['BA'] = 'Bahia';
        $estados['CE'] = 'Ceará';
        $estados['DF'] = 'Distrito Federal';
        $estados['ES'] = 'Espírito Santo';
        $estados['GO'] = 'Goiás';
        $estados['MA'] = 'Maranhão';
        $estados['MT'] = 'Mato Grosso';
        $estados['MS'] = 'Mato Grosso do Sul';
        $estados['MG'] = 'Minas Gerais';
        $estados['PA'] = 'Pará';
        $estados['PB'] = 'Paraíba';
        $estados['PR'] = 'Paraná';
        $estados['PE'] = 'Pernambuco';
        $estados['PI'] = 'Piauí';
        $estados['RJ'] = 'Rio de Janeiro';
        $estados['RN'] = 'Rio Grande do Norte';
        $estados['RS'] = 'Rio Grande do Sul';
        $estados['RO'] = 'Rondônia';
        $estados['RR'] = 'Roraima';
        $estados['SC'] = 'Santa Catarina';
        $estados['SP'] = 'São Paulo';
        $estados['SE'] = 'Sergipe';
        $estados['TO'] = 'Tocantins';

        return $estados;
    }
}