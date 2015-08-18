<?php

namespace Core\View\Service;

use Zend\Navigation\Service\AbstractNavigationFactory;

//class BreadcrumbsBuilder extends AbstractNavigationFactory implements \ArrayAccess, \Countable
class BreadcrumbsBuilder implements \ArrayAccess, \Countable
{
    protected $serviceLocator;
    protected $urlPlugin;

    protected $breadcrumbs;
    protected $currentBreadcrumbsPath = [];
    protected $container;

    public function __construct($serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;

        return $this;
    }

    public function loadBreadcrumbs($moduleName, $section = null)
    {
        $this->urlPlugin = $this->serviceLocator->get('Application')
            ->getMvcEvent()
            ->getTarget()
            ->url();

        if (!$this->breadcrumbs) {
            $configuration = $this->serviceLocator->get('Config');

            if ($section) {
                $this->breadcrumbs = $configuration['breadcrumbs'][$moduleName][$section]['pages'];
                
                $url = !empty($configuration['breadcrumbs'][$moduleName][$section]['route'])
                    ? $this->urlPlugin->fromRoute($configuration['breadcrumbs'][$moduleName][$section]['route'])
                    : null;

                $label = $configuration['breadcrumbs'][$moduleName][$section]['label'];

                if (!empty($label)) {
                    $this[] = ['label' => $label, 'url' => $url];
                }
            } else {
                $this->breadcrumbs = $configuration['breadcrumbs'][$moduleName];
            }

        }

        $currentBreadcrumbsPath = [];

        return $this;
    }

    public function addPage($id, $params = [])
    {
        $currentElement = null;

            $currentElement = $this->breadcrumbs;
        if ($this->currentBreadcrumbsPath) {
            foreach ($this->currentBreadcrumbsPath as $position) {
                $currentElement = $currentElement[$position]['pages'];
            }
        }

        foreach ($currentElement as $key => $value) {
            if ($value['id'] === $id) {
                $this->currentBreadcrumbsPath[] = $key;

                $label = $value['label'];

                if (!empty($params['labelParams'])) {
                    $label = $this->replaceVars($label, $params['labelParams']);
                }

                $routeParams = empty($params['routeParams']) ? [] : $params['routeParams'];

                $url = $this->urlPlugin->fromRoute($value['route'], $routeParams);

                $this[] = ['label' => $label, 'url' => $url];

                break;
            }
        }

        return $this;
    }

    protected function replaceVars($str, $vars)
    {
        return preg_replace_callback('/{([^}]+)}/', function($m) use ($vars) {
            return isset($vars[$m[1]]) ? $vars[$m[1]] : '';
        }, $str);
    }

    public function offsetSet($offset, $value) {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function offsetExists($offset) {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    public function count()
    {
        return count($this->container);
    }

    public function render()
    {
        $menu = '
                <ol class="breadcrumb">
                    <li><i class="fa fa-home">&nbsp;</i></li>
        ';

        $numElements = count($this->container);
        $counter = 1;

        foreach ($this->container as $item) {
            $label = strlen($item['label']) > 50 ? substr($item['label'], 0, 50) . '...' : $item['label'];

            if ($counter != $numElements && !is_null($item['url'])) {
                $menuItem = '<li><a href="' . $item['url'] . '">' . $label . '</a></li>';
            } else {
                $menuItem = '<li>' . $label . '</li>';
            }

            $menu .= $menuItem;

            $counter++;
        }

        $menu .= '
                </ol>
        ';

        return $menu;
    }
}
