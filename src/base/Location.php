<?php
namespace base;

class Location implements ILocation{

    private $__xCoord;
    private $__yCoord;

    public function __construct($xCoord, $yCoord) {
        $this->setXCoord($xCoord)->setYCoord($yCoord);
    }

    public function getXCoord(){
        return $this->__xCoord;
    }

    public function getYCoord(){
        return $this->__yCoord;
    }

    public function setXCoord($xCoord) : ILocation{
        if($this->validateCoordinate($xCoord)){
            $this->__xCoord = floatval($xCoord);
        }
        else{
            throw new \Exception("Coordinate X is not valid.");
        }
        return $this;
    }

    public function setYCoord($yCoord) : ILocation{
        if($this->validateCoordinate($yCoord)){
            $this->__yCoord = floatval($yCoord);
        }
        else{
            throw new \Exception("Coordinate Y is not valid.");
        }
        return $this;
    }

    public function validateCoordinate($val) : bool{
        return (($val!=='' && $val!==null) && is_numeric($val)) && true;
    }

}