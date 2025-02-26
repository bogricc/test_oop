<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use base\Location;
use base\BaseException;

final class LocationTest extends TestCase {

    public function testCanBeCreatedWithZeroCoodinate(): void{
        $this->assertInstanceOf(Location::class, new Location(0.0, 0.0) );
    }
    public function testCanBeCreatedWithAnyValidCoodinate(): void{
        $this->assertInstanceOf(Location::class, new Location(-42.7, 127.0) );
    }

    public function testCanSetAndGetSameValueCoordinates(): void{
        $x = 101.1;
        $y = 10.2;
        $l = new Location($x, $y);
        $this->assertSame($x, $l->getXCoord());
        $this->assertSame($y, $l->getYCoord());
    }

    public function testCannotBeCreatedWithAnInvalidCoordinateX(): void{
        $this->expectException(BaseException::class);
        new Location("", 12.2);
    }

    public function testCannotBeCreatedWithAnInvalidCoordinateY(): void{
        $this->expectException(BaseException::class);
        new Location(12.2, "");
    }
}
