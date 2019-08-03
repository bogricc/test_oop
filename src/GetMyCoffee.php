<?php

use CoffeeShop\ReadCoffeeShopList;
use CoffeeShop\CoffeeShopsArray;
use CoffeeShop\UserLocation;

final class GetMyCoffee{
    private $__reader;
    private $__userLocation;
    private $__coffeeShops;
    
    public function __construct($userXCoord, $userYCoord, $coffeeShopsCsv){
        $this->readShopsCsv($coffeeShopsCsv);
        $this->setUserLocationByCoords($userXCoord, $userYCoord);
        $this->process();
    }

    private function readShopsCsv($coffeeShopsCsv){
        $shopsListObj = new ReadCoffeeShopList($coffeeShopsCsv);
        $this->__reader = $shopsListObj;
        return $this;
    }

    private function setUserLocationByCoords($userXCoord, $userYCoord){
        $userLocation = new UserLocation($userXCoord, $userYCoord);
        $this->__userLocation = $userLocation;
        return $this;
    }

    private function process(){
        $shopsList = $this->__reader->getList();

        $this->__coffeeShops = new CoffeeShopsArray($shopsList);
        foreach($this->__coffeeShops as $shop){
            $shop->setUserLocation($this->__userLocation);
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
