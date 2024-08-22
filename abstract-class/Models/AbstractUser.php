<?php

abstract class AbstractUser
{
    public $id, $name, $email, $address;

    public function __construct($id = "", $name = "", $email = "", $address = "")
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
    }

    // action / function abstrak yang harus diimplementasikan oleh kelas turunan
    abstract public function register();
}
