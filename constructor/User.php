<?php

class User {
    // melakukan registrasi properti global
    public $id, $name, $email, $address, $role;

    // construct nilai default
    // public function __construct()
    // {
    //     $this->id = 1;
    //     $this->name = "Asep";
    //     $this->email = "asep@example.com";
    //     $this->address = "Bandung";
    //     $this->role = "admin";
    // }

    // constructor dengan variable parameter
    public function __construct( $id, $name, $email, $address, $role )
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->role = $role;
    }
}

