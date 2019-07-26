<?php
namespace CoffeeShop;
use base\ILocation;

interface IShop extends ILocation{
    public function setShopName(String $name) : IShop;
    public function validateName(String $name) : bool;
}