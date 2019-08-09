<?php

namespace Fornecedor\Form;

use Zend\Form\Form;

class FornecedorForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('fornecedor');

        $this->add([
            'name' => 'EMPRESA',
            'type' => 'text',
        ]);

        $this->add([
            'name' => 'FORNECEDOR',
            'type' => 'text',
        ]);
        
        $this->add([
            'name' => 'NOME',
            'type' => 'text',
        ]);

        $this->add([
            'name' => 'RG',
            'type' => 'text',
        ]);

        $this->add([
            'name' => 'DATA_NASCIMENTO',
            'type' => 'text',
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