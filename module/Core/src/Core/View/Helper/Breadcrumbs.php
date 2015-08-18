<?php

namespace Core\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Breadcrumbs extends AbstractHelper
{ 
    protected $breadcrumbsBuilder;

    public function __construct($breadcrumbsBuilder)
    {
        $this->breadcrumbsBuilder = $breadcrumbsBuilder;

        return $this;
    }

    public function __invoke()
    {
        return $this;
    }

    public function hasItems()
    {
        return (boolean) count($this->breadcrumbsBuilder);
    }

    public function render()
    {
        return $this->breadcrumbsBuilder->render();
    }
}
