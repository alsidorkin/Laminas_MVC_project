<?php

namespace Category;

use Laminas\Router\Http\Literal;
use Laminas\Router\Http\Segment;
use Laminas\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\CategoryController::class => Factory\CategoryControllerFactory::class,
        ],
    ],
    'router' => [
        'routes' => [
            'category' => [
                'type' => Literal::class,
                'options' => [
                    'route'    => '/category',
                    'defaults' => [
                        'controller' => Controller\CategoryController::class,
                        'action'     => 'index',
                    ],
                ],
                'may_terminate' => true,
                'child_routes'  => [
                    'detail' => [
                        'type' => Segment::class,
                        'options' => [
                            'route'       => '/:id',
                            'defaults'    => [
                                'action' => 'detail',
                            ],
                            'constraints' => [
                                'id' => '[1-9]\d*',
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'service_manager' => [
        'aliases' => [
            \Category\Model\CategoryRepositoryInterface::class => \Category\Model\LaminasDbSqlRepository::class,
        ],
        'factories' => [
            Model\CategoryRepository::class => Factory\CategoryRepositoryFactory::class,
            \Category\Model\LaminasDbSqlRepository::class => \Category\Factory\LaminasDbSqlRepositoryFactory::class,
            Model\Category::class => InvokableFactory::class,
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
