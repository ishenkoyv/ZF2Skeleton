<?php

return [ 
    'service_manager' => [ 
        'factories' => [
            'Core\Pomm' => '\Core\ServiceManager\Factory\Pomm',
        ],
        'aliases' => [
            'pomm' => 'Core\Pomm',
        ],
    ],
];
