<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use CoffeeShop\CoffeeShopWithDistanceToUser;
use CoffeeShop\UserLocation;

final class CoffeeShopWithDistanceToUserTest extends TestCase {

    public function testCanCalculateDistanceCorrectly(): void{
        $obj = new CoffeeShopWithDistanceToUser(0.0,0.0,"TestShop");
        $obj->setUserLocation(new UserLocation(3.0,0.0));
        $expectedDistance = 3.0;
        $this->assertSame($expectedDistance, $obj->getDistance());
    }
}
