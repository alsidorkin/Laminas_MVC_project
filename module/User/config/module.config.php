<?php
namespace User;

use Laminas\Router\Http\Segment;
use Laminas\Db\Adapter\Adapter;
use Laminas\Db\Adapter\AdapterInterface;
use Laminas\Db\TableGateway\TableGateway;
use User\Controller\UserController;
use User\Model\UserTable;

return [
    'router' => [
        'routes' => [
            'user' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/user[/:action[/:id]]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => UserController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            UserController::class => function($container) {
                return new UserController(
                    $container->get(UserTable::class)
                );
            },
        ],
    ],
    'service_manager' => [
        'factories' => [
            AdapterInterface::class => function($container) {
                $config = $container->get('config');
                return new Adapter($config['db']);
            },
            UserTable::class => function($container) {
                $tableGateway = $container->get(UserTableGateway::class);
                return new UserTable($tableGateway);
            },
            UserTableGateway::class => function ($container) {
                $dbAdapter = $container->get(AdapterInterface::class);
                return new TableGateway('user', $dbAdapter);
            },
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
