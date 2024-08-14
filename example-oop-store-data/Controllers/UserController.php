<?php

require 'Models/User.php';
require 'Services/Request.php';

class UserController {

    public function index() 
    {
        return User::all();
    }
    
    public function store(Request $request) {

        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        User::create($validated);

        header("Location: index.php");
        exit;
    }

}
?>
