<?php
namespace base;

interface ILocation{
    public function setXCoord($xCoord) : ILocation;
    public function setYCoord($yCoord) : ILocation;
    public function validateCoordinate($val) : bool;
}
