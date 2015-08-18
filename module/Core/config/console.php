<?php

return [
    'console' => [
        'router' => [
            'routes' => [
                // app-provisioning
                'app-provisioning' => [
                    'options' => [
                        'route'    => 'app-provisioning',
                        'defaults' => [
                            'controller' => 'Core\Command\Provisioning',
                            'action'     => 'run'
                        ]
                    ]
                ],
                // \app-provisioning
            ],
        ],
    ],
];
