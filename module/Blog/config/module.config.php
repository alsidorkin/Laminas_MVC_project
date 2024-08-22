<?php

namespace Blog;

use Laminas\ServiceManager\Factory\InvokableFactory;
use Laminas\Router\Http\Literal;

return [
    'service_manager' => [
        'aliases' => [
            Model\PostRepositoryInterface::class => Model\LaminasDbSqlRepository::class,
        ],
        'factories' => [
            Model\PostRepository::class => InvokableFactory::class,
            Model\LaminasDbSqlRepository::class => Factory\LaminasDbSqlRepositoryFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'blog' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/blog',
                    'defaults' => [
                        'controller' => Controller\ListController::class,
                        'action'     => 'index',
                    ]
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\ListController::class => Factory\ListControllerFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];