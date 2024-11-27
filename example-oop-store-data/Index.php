<?php
// index.php

require 'Controllers/UserController.php';

$userController = new UserController();

$errors = [
    'name' => '',
    'email' => '',
    'address' => ''
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userRequest = new Request($_POST);
    try {
        $userController->store($userRequest);
    } catch (Exception $e) {
        $errors = json_decode($e->getMessage(), true);
    }
}

$users = $userController->index();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
</head>
<body>
    <h1>User Management</h1>

    <h2>Add User</h2>
    <form method="POST" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name">
        <?php if (!empty($errors['name'])): ?>
            <div style="color: red;"><?= htmlspecialchars($errors['name']) ?></div>
        <?php endif; ?>
        <br><br>
        <label for="address">Alamat:</label>
        <input type="text" id="address" name="address">
        <?php if (!empty($errors['address'])): ?>
            <div style="color: red;"><?= htmlspecialchars($errors['address']) ?></div>
        <?php endif; ?>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        <?php if (!empty($errors['email'])): ?>
            <div style="color: red;"><?= htmlspecialchars($errors['email']) ?></div>
        <?php endif; ?>
        <br><br>
        <button type="submit">Add User</button>
    </form>

    <h2>Users List</h2>
    <ul>
    <?php if (count($users) > 0): ?>
        <ul>
            <?php foreach ($users as $user): ?>
                <li>
                    ID: <?= htmlspecialchars($user->id) ?><br>
                    Name: <?= htmlspecialchars($user->name) ?><br>
                    Email: <?= htmlspecialchars($user->email) ?><br>
                    Address: <?= htmlspecialchars($user->address) ?><br>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p style="color: purple;">No users found.</p>
    <?php endif; ?>
    </ul>

</body>
</html>
