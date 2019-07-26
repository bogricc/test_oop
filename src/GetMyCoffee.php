<?php

use CoffeeShop\ReadCoffeeShopList;
use base\Location;
use CoffeeShop\CoffeeShopsArray;

final class GetMyCoffee{
    private $__reader;
    private $__userLocation;
    private $__coffeeShops;
    
    public function __construct($userXCoord, $userYCoord, $coffeeShopsCsv)
    {
        $this->readShopsCsv($coffeeShopsCsv);
        $this->setUserLocationByCoords($userXCoord, $userYCoord);
        $this->process();
    }

    public function readShopsCsv($coffeeShopsCsv){
        $shopsListObj = new ReadCoffeeShopList($coffeeShopsCsv);
        $this->__reader = $shopsListObj;
        return $this;
    }

    public function setUserLocationByCoords($userXCoord, $userYCoord){
        $userLocation = new Location($userXCoord, $userYCoord);
        $this->__userLocation = $userLocation;
        return $this;
    }

    public function process(){
        //get the list of shops objs
        $shopsList = $this->__reader->getList();

        $this->__coffeeShops = new CoffeeShopsArray($shopsList);
        foreach($this->__coffeeShops as $shop){
            $shop->calcDistance($this->__userLocation);
        }
    }

    public function getNearShops(){
        $shops = $this->__coffeeShops;
        $shops->uasort(function($a, $b){
            return $a->getDistance() > $b->getDistance();
        });
        $arr = $shops->getArrayCopy();
        return array_slice($arr, 0, 3);
    }
}