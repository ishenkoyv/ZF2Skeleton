<?php

namespace Core\ServiceManager\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use PommProject\Foundation\Pomm as CorePomm;

class Pomm implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('config');

        $dbParams = $config['db'];

        $dsn = 'pgsql://'
            . $dbParams['username']
            . (!empty($dbParams['password']) ? ':' . $dbParams['password'] : '')
            . '@' . $dbParams['host']
            . ':' . $dbParams['port']
            . '/' . $dbParams['dbname'];


        $pomm = new CorePomm([
            $dbParams['dbname'] => [
                'pomm:default' => true,
                'dsn' => $dsn,
                'class:session_builder' => '\PommProject\ModelManager\SessionBuilder',
            ]
        ]);

        /*
        $pomm->addPostConfiguration($dbParams['dbname'], function($session) {
            $converterHolder = $session->getPoolerForType('converter')
                ->getConverterHolder();
            
            $converterHolder
              ->registerConverter('public.geometry', new GeometryPoint, ['public.geometry', 'geometry'])
        });
        */

        return $pomm;
    }
}
