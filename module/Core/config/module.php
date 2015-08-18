<?php
return [
    'controllers' => [
        'invokables' => [
            'Core\Command\Provisioning' => 'Core\Command\ProvisioningCommand',
            'Core\Controller\Index' => 'Core\Controller\IndexController',
        ],
    ],
    'controller_plugins' => [
        'invokables' => [
            'pomm' => 'Core\Controller\Plugin\Pomm',
        ],
    ],
    'view_manager' => [
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => [
            'layout/application'           => APPLICATION_PATH . '/layout/application.phtml',
            'layout/blank'           => APPLICATION_PATH . '/layout/blank.phtml',
            'error/404'               => __DIR__ . '/../view/error/404.phtml',
            'error/index'             => __DIR__ . '/../view/error/index.phtml',
            'error/unauthorized'             => __DIR__ . '/../view/error/unauthorized.phtml',
        ],
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy',
        ],
    ],
];
