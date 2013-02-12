<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Library\Controller\Book' => 'Library\Controller\BookController',
        ),
    ),
    
    'router' => array(
        'routes' => array(
            'book' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/book[/:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Library\Controller\Book',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'library' => __DIR__ . '/../view',
        ),
    ),
);
