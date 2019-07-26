<?php
namespace CoffeeShop;

class PrintMyCoffee{
    public static function console($coffeeArray){
        foreach($coffeeArray as $cshp){
            echo $cshp->getShopName(), ",", round($cshp->getDistance(), 4), PHP_EOL;
        }
    }
}