<?php

namespace Core\View\Helper;

use Zend\View\Helper\AbstractHelper;

class ContentMenu extends AbstractHelper
{ 
    protected $contentMenuBuilder;

    public function __construct($contentMenuBuilder)
    {
        $this->contentMenuBuilder = $contentMenuBuilder;

        return $this;
    }

    public function __invoke()
    {
        return $this;
    }

    public function hasItems()
    {
        return (boolean) count($this->contentMenuBuilder);
    }

    public function render()
    {
        return $this->contentMenuBuilder->render();
    }
}
