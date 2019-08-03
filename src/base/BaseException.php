<?php

namespace base;

class BaseException extends \Exception{
    public function __toString() {
        return "Error: {$this->message} in {$this->file}({$this->line})".PHP_EOL;
    }
}
