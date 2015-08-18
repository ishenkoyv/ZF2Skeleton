<?php

namespace Core\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use \PommProject\Foundation\Pomm;

use Core\Pomm\Zf2skeleton\PublicSchema\PageModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $this->layout('layout/application');

        $page = $this->pomm()->getModel(PageModel::class)
            ->findWhere('name = $*', ['homepage'])
            ->current();

        return [
            'page' => $page,
        ];
    }
}
