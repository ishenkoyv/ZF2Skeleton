<?php

namespace Core\Controller\Plugin;

use Zend\Mvc\Controller\Plugin\AbstractPlugin;

class Pomm extends AbstractPlugin
{
    public function __invoke($sessionName = null)
    {
        $pomm = $this->controller->getServiceLocator()->get('pomm');

        return $sessionName ? $pomm[$sessionName] : $pomm->getDefaultSession(); 
    }
}
