<?php

class BaseClass
{
    public $id, $name, $email, $address, $role;

    public function __construct($id, $name, $email, $address, $role)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->role = $role;
    }
}
