<?php

namespace Empresa;

use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\ResultSet\ResultSet;
use Zend\Db\TableGateway\TableGateway;
use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }

    public function getServiceConfig(){
        return [
            'factories' => [
                Model\EmpresaTable::class => function($container) {
                    $tableGateway = $container->get(Model\EmpresaTableGateway::class);
                    return new Model\EmpresaTable($tableGateway);
                },
                Model\EmpresaTableGateway::class => function ($container) {
                    $dbAdapter = $container->get(AdapterInterface::class);
                    $resultSetPrototype = new ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Empresa());
                    return new TableGateway('empresa', $dbAdapter, null, $resultSetPrototype);
                },
            ],  
        ];
    }

    public function getControllerConfig(){
        return [
            'factories' => [
                Controller\EmpresaController::class => function($container) {
                    return new Controller\EmpresaController(
                        $container->get(Model\EmpresaTable::class)
                    );
                },
            ],
        ];
    }
}