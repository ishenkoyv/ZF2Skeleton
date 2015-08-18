<?php
namespace Core;

use IyvZF2Generic\ModuleManager\AbstractModule;
use Zend\Console\Adapter\AdapterInterface as Console;

class Module extends AbstractModule
{
    public function getConsoleUsage(Console $console)
    {
        return array(
            'app-provisioning' => 'Prepare application for first run',
        );
    }
}
