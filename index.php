<?php
require "vendor/autoload.php";

$usage = <<<USG
Not enough parameters.
call example: 
php -f index.php 47.6 -122.4 coffee_shops.csv
USG;

if($argc !== 4){
    echo $usage, " ($argc)", PHP_EOL;
}
else{
    $coordX  = $argv[1];
    $coordY  = $argv[2];
    $csvFile = $argv[3];
    try{
        $coffeeOptions = new GetMyCoffee($coordX, $coordY, $csvFile);
        $coffeeArrived = $coffeeOptions->getNearShops();
        CoffeeShop\PrintMyCoffee::console($coffeeArrived);
    } catch(Exception $exceptionObject){
        // echo "Error: {$exceptionObject->getMessage()}",PHP_EOL;
        echo $exceptionObject, PHP_EOL;
    }
}
