<?php
namespace Bookshelf;

return [
    'service_manager' => [
        'factories' => [
            Model\BookTable::class => Factory\BookTableFactory::class,
        ],
    ],

    'controllers' => [
        'factories' => [
            Controller\BookController::class => Factory\BookControllerFactory::class,
        ],
    ],

    'router' => [
        'routes' => [
            'book' => [
                'type'    => 'segment',
                'options' => [
                    'route'    => '/book[/:action][/:id]',
                    'constraints' => [
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ],
                    'defaults' => [
                        'controller' => Controller\BookController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],

    'view_manager' => [
        'template_path_stack' => [
            'library' => __DIR__ . '/../view',
        ],
    ],
];
