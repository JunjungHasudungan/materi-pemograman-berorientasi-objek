<?php

// memanggil / registrasi BaseClass
require_once 'BaseClass.php';

// melakukan pewarisan dari ParentClass ke ChildClass
class ChildClass extends BaseClass
{
    // membuat properti tambahan diChildClass
    public $phoneNumber;

    public function __construct($id, $name, $email, $address, $role, int $phoneNumber)
    {
        // melakukan overriding method construct dari parent class
        parent::__construct($id, $name, $email, $address, $role);
        
        // memberikan nilai variable parameter $phoneNumber ke properti global $this->phoneNumber
        $this->phoneNumber = $phoneNumber;
    }
}
