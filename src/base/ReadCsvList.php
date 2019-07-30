<?php

namespace base;

class ReadCsvList{
    public $csvFile;
    public $csvList;

    public function __construct($csvFile, $csvHeader = [])
    {
        if(file_exists($csvFile)){
            $this->csvFile = $csvFile;
        }
        else{
            throw new \Exception("CsvFile $csvFile does not exist.");
        }

        $csv = $this->readCsv();
        if(empty($csv)){
            throw new \Exception("Csv file contains no line");
        }
        $this->csvList = $csv;

        if(!empty($csvHeader)){
            $this->setIndexes($csvHeader);
        }
    }

    public function readCsv(){
        $csv = array_map('str_getcsv', file($this->csvFile, FILE_SKIP_EMPTY_LINES|FILE_IGNORE_NEW_LINES));
        return $csv;
    }
    public function setIndexes($csvHeader){
        if(is_array($csvHeader)){
            $headerLength = count($csvHeader);
            $all = count($this->csvList, COUNT_RECURSIVE);
            $lvl = count($this->csvList);
            $csvColumnsSize = ($all-$lvl) / $lvl;
            if($headerLength != $csvColumnsSize){
                throw new \Exception("Header size does not match to csv column size.");
            }
            else{
                $this->csvList = array_map(function($el) use ($csvHeader){
                    return array_combine($csvHeader, $el);
                }, $this->csvList);
            }
        }
        else{
            throw new \Exception("Csv Header is not an array.");
        }
    }
}