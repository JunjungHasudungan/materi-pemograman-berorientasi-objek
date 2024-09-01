<?php

namespace App\Models;

require_once 'App/Testing/Person.php';

use App\Testing\Person;

class ChildClass {
    public function __construct()
    {
        echo 'ini dari class' . __CLASS__;
    }
}