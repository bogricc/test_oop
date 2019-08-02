<?php
namespace CoffeeShop;
use base\ILocation;

class CoffeeShopWithDistance extends CoffeeShop{
    private $__distance;

    public function __construct($xCoord, $yCoord, $shopName, $distance = 0.0)
    {
        parent::__construct($xCoord, $yCoord, $shopName);
        $this->setDistance($distance);
    }

    public function setDistance($distance){
        if(is_float($distance)){
            $this->__distance = $distance;
        }
        return $this;
    }
    public function getDistance(){
        return $this->__distance;
    }

    public function calcDistance(ILocation $userLocation){

        $xd = pow($this->getXCoord() - $userLocation->getXCoord(), 2);
        $yd = pow($this->getYCoord() - $userLocation->getYCoord(), 2);
        $dd = sqrt($xd+$yd);

        $this->setDistance($dd);
    }
}
