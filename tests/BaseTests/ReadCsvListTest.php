<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use base\ReadCsvList;
use base\BaseException;

final class ReadCsvListTest extends TestCase {

    public function testCanLoadCsv(): void{
        $csvFile = "coffee_shops.csv";
        $this->assertInstanceOf(ReadCsvList::class, new ReadCsvList($csvFile));
    }
    public function testThrowsExceptionWhenLoadingInexistentCsv(): void{
        $csvFile = "inexistent_file.csv";
        $this->expectException(BaseException::class);
        new ReadCsvList($csvFile);
    }
    public function testThrowsExceptionWhenLoadingEmptyCsv(): void{
        $csvFile = "coffee_shops_empty.csv";
        $this->expectException(BaseException::class);
        new ReadCsvList($csvFile);
    }
    public function testThrowsExceptionWhenLoadingMalformedCsv(): void{
        $csvFile = "coffee_shops_bad.csv";
        $csvHeader = ["Coordinate Y", "Coordinate X", "ShopName"];
        $this->expectException(BaseException::class);
        new ReadCsvList($csvFile, $csvHeader);
    }

    public function testCanSetIndexes(): void{
        $csvFile = "coffee_shops.csv";
        $csvHeader = ["Coordinate Y", "Coordinate X", "ShopName"];
        $this->assertInstanceOf(ReadCsvList::class, new ReadCsvList($csvFile, $csvHeader));
    }

    public function testThrowsExceptionWithMalformedIndexes(): void{
        $csvFile = "coffee_shops.csv";
        $csvHeader = '["Coordinate Y", "Coordinate X", "ShopName"]';
        $this->expectException(BaseException::class);
        new ReadCsvList($csvFile, $csvHeader);
    }
}
