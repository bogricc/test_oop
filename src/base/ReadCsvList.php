<?php

namespace base;

class ReadCsvList{
    public $csvFile;
    public $csvList;

    public function __construct($csvFile, $csvHeader = []) {
        if(file_exists($csvFile)){
            $this->csvFile = $csvFile;
        }
        else{
            throw new BaseException("CsvFile $csvFile does not exist.");
        }

        $csv = $this->readCsv();
        if(empty($csv)){
            throw new BaseException("Csv file contains no line");
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
            $csvList = $this->csvList;
            $csvHeaderSize = count($csvHeader);
            $newCsvList = array_filter($csvList, function($el) use ($csvHeaderSize){
                return (count($el) == $csvHeaderSize);
            });

            if(count($newCsvList) != count($csvList)){
                throw new BaseException("Header size does not match to all csv lines.");
            }
            else{
                $this->csvList = array_map(function($el) use ($csvHeader){
                    return array_combine($csvHeader, $el);
                }, $csvList);
            }
        }
        else{
            throw new BaseException("Csv Header is not an array.");
        }
    }
}
