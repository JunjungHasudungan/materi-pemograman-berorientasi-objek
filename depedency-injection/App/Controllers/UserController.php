<?php

namespace App\Controllers;

use App\Models\User;
use App\ServiceTrait\InteractWithDatabase;
use App\Utilities\ValidateRequest;

class UserController {
    
    use InteractWithDatabase;

    public function store(ValidateRequest $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
        ]);

        User::create($validated);

    }

    public function update()
    {
        session_start();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
            // Ambil data dari form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            $id = $_POST['id']; 

            $user = new User($id, $name, $email, $address, $role); 

            // Panggil fungsi update
            if ($user->update()) {
                header("Location: index.php");
                exit();
            } else {
                echo "Gagal memperbarui data.";
            }
        }
    }

}

// Menangani aksi yang diterima
if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'update':
            (new UserController())->update(); // Panggil method update
            break;
        default:
            // Tangani aksi lainnya jika perlu
            break;
    }
}