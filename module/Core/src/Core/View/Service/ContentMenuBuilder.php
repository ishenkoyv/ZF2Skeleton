<?php

namespace Core\View\Service;

class ContentMenuBuilder implements \ArrayAccess, \Countable
{
    protected $container;

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
            <div class="dropdown">
                <a data-toggle="dropdown" href="#" style="font-size: 1.2em;"><i class="fa fa-ellipsis-v">&nbsp;</i><b class="caret">&nbsp;</b></a>
                <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dLabel">
        ';

        foreach ($this->container as $item) {
            $menuItem = '<li><a href="' . $item['url'] . '">' . $item['label'] . '</a></li>';
            $menu .= $menuItem;
        }

        $menu .= '
                </ul>
            </div>
        ';

        return $menu;
    }
}
