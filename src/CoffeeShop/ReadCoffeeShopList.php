<?php
namespace CoffeeShop;

use base\ReadCsvList;

class ReadCoffeeShopList extends ReadCsvList{
    private $csvHeader = [
        'ShopName',
        'CoordinateY',
        'CoordinateX',
    ];

    public function __construct($csvFile)
    {
        parent::__construct($csvFile, $this->csvHeader);
    }

    public function getList(){
        $list = [];

        $list = array_map(function($item){
            return new CoffeeShopDistance($item['CoordinateX'], $item['CoordinateY'], $item['ShopName']);
        }, $this->csvList);

        return $list;
    }
}