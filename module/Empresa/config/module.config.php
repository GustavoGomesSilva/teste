<?php

namespace Empresa;

//use Zend\ServiceManager\Factory\InvokableFactory;
use Zend\Router\Http\Segment;

return [
    /*'controllers' => [
        'factories' => [
            Controller\EmpresaController::class => InvokableFactory::class,
        ],
    ],*/

    'router' => [
        'routes' => [
            'empresa' => [
                'type'    => Segment::class,
                'options' => [
                    'route' => '/empresa[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\EmpresaController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'empresa' => __DIR__ . '/../view',
        ],
    ],
];