<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ExpectedOutputTest extends TestCase {
    public function testCanOutputExpected(): void{
        $expectedOutput = "Starbucks Rio De Janeiro,134.7088\n".
        "Starbucks Sydney,136.2776\n".
        "Starbucks Moscow,178.4328\n";

        $this->expectOutputString($expectedOutput);

        $coordX = "47.6";
        $coordY = "-122.4";
        $csvFile = "coffee_shops.csv";

        $v = new GetMyCoffee($coordX, $coordY, $csvFile);
        $arr = $v->getNearShops();
        CoffeeShop\PrintMyCoffee::console($arr);
    }
}