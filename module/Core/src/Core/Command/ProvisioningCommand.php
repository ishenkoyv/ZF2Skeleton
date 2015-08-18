<?php

namespace Core\Command;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Core\Pomm\Zf2skeleton\PublicSchema\PageModel;

class ProvisioningCommand extends AbstractActionController
{
    protected $serviceLocator;
    protected $pomm;

    public function runAction()
    {
        $this->init();
        $this->importPages();

        return PHP_EOL;
    }

    protected function init()
    {
        $this->serviceLocator = $this->getServiceLocator();
        $this->pomm = $this->serviceLocator->get('pomm');
    }

    protected function importPages()
    {
        echo "Import pages...\n";

        $html = <<<EOL
<div class="col-md-6 col-md-offset-3">
  <div class="jumbotron text-center">
    <h1>ZF 2 Skeleton</h1>
    <p class="lead">Core ZF2 application backbone with integrated Pomm library to communication with postgresql.</p>
    <p><a role="button" href="https://github.com/ishenkoyv/ZF2Skeleton" target="_blank" class="btn btn-lg btn-success">Fork Me</a></p>
  </div>
</div>
EOL;
        $this->pomm->getDefaultSession()->getModel(PageModel::class)
            ->createAndSave([
                'page_id' => 1,
                'name' => 'homepage',
                'content' => $html,
            ]);
    }
}
