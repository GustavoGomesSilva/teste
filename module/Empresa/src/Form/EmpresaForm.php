<?php

namespace Empresa\Form;

use Zend\Form\Form;

class EmpresaForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('empresa');

        $this->add([
            'name' => 'CNPJ',
            'type' => 'text',
        ]);
        
        $this->add([
            'name' => 'NOME_FANTASIA',
            'type' => 'text',
            'options' => [
                'label' => 'Nome Fantasia',
            ],
        ]);

        $this->add([
            'name' => 'UF',
            'type' => 'text',
            'options' => [
                'label' => 'uf',
            ],
        ]);

        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Go',
                'id'    => 'submitbutton',
            ],
        ]);
    }
}