<?php
namespace CoffeeShop;
use base\ILocation;

class CoffeeShopWithDistanceToUser extends CoffeeShop{
    private $__distance;
    private $__userLocation;

    public function __construct($xCoord, $yCoord, $shopName)
    {
        parent::__construct($xCoord, $yCoord, $shopName);
        $this->__userLocation = NULL;
    }

    private function setDistance($distance){
        if(is_float($distance)){
            $this->__distance = $distance;
        }
        return $this;
    }

    public function getDistance() : float{
        $distance = 0.0;
        if($this->__userLocation instanceof ILocation){
            $distance = $this->calcDistance();
        }
        else{
            throw new CoffeeShopException("User location not set. Cannot calculate and get distance.");
        }
        return $distance;
    }

    public function setUserLocation(ILocation $userLocation){
        if($userLocation instanceof ILocation){
            $this->__userLocation = $userLocation;
        }
    }

    public function calcDistance() : float{
        $userLocation = $this->__userLocation;
        $xd = pow($this->getXCoord() - $userLocation->getXCoord(), 2);
        $yd = pow($this->getYCoord() - $userLocation->getYCoord(), 2);
        $dd = sqrt($xd+$yd);

        $this->setDistance($dd);
        return $dd;
    }
}
