<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CoffeeShop\CoffeeShopDistance;
use base\Location;

final class CoffeeShopDistanceTest extends TestCase {

    public function testCanCalculateDistanceCorrectly(): void{
        $obj = new CoffeeShopDistance(0.0,0.0,"TestShop");
        $obj->calcDistance(new Location(3.0,0.0));
        $expectedDistance = 3.0;
        $this->assertSame($expectedDistance, $obj->getDistance());
    }

}
