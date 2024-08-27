<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<?php
    require_once 'Models/User.php';
    
    require_once 'helper/Role.php';

    if (!isset($_GET['id']) || empty($_GET['id'])) {
        header('Location: index.php');
        exit;
    }
    $user = new User();

    $roles = Role::roles;

    $user->setData($_GET['id']);


    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
        $user->setName($_POST['name']);
        $user->setEmail($_POST['email']);
        $user->setAdress($_POST['address']);
        $user->setRole($_POST['role']);
        
        if ($user->update()) {
            header('Location: index.php');
            exit;
        } else {
            $error = 'Update failed.';
        }
    }
?>

<div class="container">
    <div class="card">
        <h2>Edit User</h2>
        <form action="" method="post">
            <input type="text" name="name" value="<?= htmlspecialchars($user->name); ?>" required placeholder="masukkan nama..">
            <input type="email" name="email" value="<?= htmlspecialchars($user->email); ?>" required placeholder="masukkan email..">
            <input type="text" name="address" value="<?= htmlspecialchars($user->address); ?>" required placeholder="masukkan alamat..">
            <select name="role" id="role" required>
                <?php foreach ($roles as $key => $value): ?>
                    <option value="<?= htmlspecialchars($value) ?>" <?= $user->getRole() === $value ? 'selected' : '' ?>>
                        <?= htmlspecialchars($key) ?>
                    </option>
                <?php endforeach; ?>
            </select><br><br>
            <input type="submit" name="update" value="Update">
        </form>
    </div>
</div> 
</body>
</html>
