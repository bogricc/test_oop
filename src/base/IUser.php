<?php

namespace base;

interface IUser{
    public function getUserName() : string;
    public function setUserName(string $name) : IUser;
}
