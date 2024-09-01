<?php

namespace App\Contract;

class PersonInterface {
    public function __construct()
    {
        echo 'ini dari class' . __CLASS__;
    }
}