<?php

class BaseClass
{
    public $id;
    public $name;
    public $address;
    public $email;

    public function __construct($id = "", $name = "", $address = "", $email = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->address = $address;
        $this->email = $email;
    }
}
