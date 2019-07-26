<?php
namespace CoffeeShop;
use base\Location;

class CoffeeShop extends Location implements IShop{
    private $__shopName;

    public function __construct($xCoord, $yCoord, $shopName)
    {
        parent::__construct($xCoord, $yCoord);

        $this->setShopName($shopName);
    }
    
    public function getShopName() : string
    {
        return $this->__shopName;
    }

    public function setShopName(String $name) : IShop {
        if($this->validateName($name)){
            $this->__shopName = $name;
        }
        return $this;
    }

    public function validateName($name) : bool{
       return ((empty($name)===false) && is_string($name)) && true;
    }
}