<?php

require 'helper/Role.php';
require 'Models/BaseClass.php';
require 'Models/User.php';

// Memuat konfigurasi database
$config = require 'config/database.php';

try {
    $dsn = 'mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'];
    $pdo = new PDO($dsn, $config['db_user'], $config['db_pass'], $config['db_options']);
} catch (PDOException $e) {
    echo "Koneksi database gagal: " . $e->getMessage();
    die();
}

// use Models\User;

// Memproses form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $role = $_POST['role'];

    // Membuat instance User
    $user = new User($pdo, null, $name, $email, $address, $role);
    $user->save(); // Menyimpan data ke database
}

// Mengambil semua pengguna menggunakan metode `getAllUsers` di model `User`
$userModel = new User($pdo);
$users = $userModel->getAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add User</title>
</head>
<body>
    <h2>Tambah Pengguna</h2>
    <form action="" method="POST">
        <label for="name">Nama:</label>
        <input type="text" name="name" id="name" required><br><br>

        <label for="address">Alamat:</label>
        <input type="text" name="address" id="address" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="role">Peran:</label>
        <select name="role" id="role" required>
            <?php foreach (Role::roles as $key => $value) : ?>
                <option value="<?= $value ?>"><?= $key ?></option>
            <?php endforeach; ?>
        </select><br><br>

        <input type="submit" value="Tambah Pengguna">
    </form>

    <h2>Daftar Pengguna</h2>
    <?php if ($users): ?>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Email</th>
                <th>Peran</th>
            </tr>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user->id ?></td>
                    <td><?= $user->name ?></td>
                    <td><?= $user->address ?></td>
                    <td><?= $user->email ?></td>
                    <td><?= $user->role ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Belum ada pengguna yang terdaftar.</p>
    <?php endif; ?>
</body>
</html>
