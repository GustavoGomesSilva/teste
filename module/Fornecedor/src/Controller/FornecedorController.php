<?php

namespace Fornecedor\Controller;

use Fornecedor\Model\FornecedorTable;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Fornecedor\Form\FornecedorForm;
use Fornecedor\Model\Fornecedor;

class FornecedorController extends AbstractActionController
{
    private $table;

    public function __construct(FornecedorTable $table)
    {
        $this->table = $table;
    }

    public function indexAction()
    {
        return new ViewModel([
            'fornecedores' => $this->table->fetchAll(),
        ]);
    }

    public function addAction()
    {
        $form = new FornecedorForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        if (! $request->isPost()) {
            return ['empresas' => $this->getEmpresas()];
        }

        $fornecedor = new Fornecedor();
        $form->setData($request->getPost());

        
        if (! $form->isValid()) {
            return ['empresas' => $this->getEmpresas()];
        }        

        $fornecedor->exchangeArray($form->getData());
        $this->table->saveFornecedor($fornecedor);

        return $this->redirect()->toRoute('fornecedor');
    }

    public function getFornecedoresAction(){
        $nome       = $this->params()->fromQuery('nome', '');
        $fornecedor = $this->params()->fromQuery('fornecedor', '');
        $data       = $this->params()->fromQuery('data', '');

        $where = array();

        if($nome){
            $where['nome'] = $nome;
        }

        if($fornecedor){
            $where['fornecedor'] = $fornecedor;
        }

        if($data){
            $where['data_cadastro'] = $data;
        }

        $view = new ViewModel([
            'fornecedores' => $this->table->fetchList($where),
        ]);

        $view->setTerminal(true);

        return $view;
    }

    public function getEmpresas(){
        $empresas = array();

        $empresas['10'] = array('nome' => 'Empresa 1', 'uf' => 'MG');
        $empresas['20'] = array('nome' => 'Empresa 2', 'uf' => 'PR');

        return $empresas;
    }
}