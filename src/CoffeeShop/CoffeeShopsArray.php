<?php
namespace CoffeeShop;

class CoffeeShopsArray extends \ArrayObject{

    public function __construct($shopList) {
        $list = $this->filterList($shopList);

        parent::__construct($list);
    }

    public function filterList($list){
        $newList = [];

        $filterCB = function($item){
            $v = ($item instanceof IShop);
            return $v;
        };
        $newList = array_filter($list, $filterCB);
        return $newList;
    }
}
