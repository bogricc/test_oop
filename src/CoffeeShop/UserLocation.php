<?php

namespace CoffeeShop;

use base\Location;
use base\IUser;

class UserLocation extends Location implements IUser{
    private $__name;
    public function __construct($xCoord = 0.0, $yCoord = 0.0, string $name = "") {
        parent::__construct($xCoord, $yCoord);
        $this->setUserName($name);
    }

    public function setUserName($name) : IUser{
        if($this->validateName($name)){
            $this->__name;
        }
        else{
            throw new CoffeeShopException("User name is not valid.");
        }
        return $this;
    }

    public function getUserName() : string{
        return $this->__name;
    }

    public function validateName($name) : bool{
       return (is_string($name) && true);
    }
}
