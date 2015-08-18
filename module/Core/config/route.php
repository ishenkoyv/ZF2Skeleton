<?php

return [
  'router' => [
        'routes' => [
            'home' => [
                'type' => 'Zend\Mvc\Router\Http\Literal',
                'options' => [
                    'route'    => '/',
                    'defaults' => [
                        'controller' => 'Core\Controller\Index',
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
];
