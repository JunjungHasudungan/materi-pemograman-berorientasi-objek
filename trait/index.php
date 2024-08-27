<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel ="stylesheet" href="style.css"/>  
</head>
    <body>
        <?php
            require_once 'Models/User.php';  // Gunakan require_once untuk menghindari pengulangan
            require_once 'helper/Role.php';
            session_start(); // Memulai session

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
                // Mengambil data dari form
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $role = $_POST['role'];

                // Registrasi user baru
                $user = new User(null, $name, $email, $address, $role);
                $user->register();
            }

            $users = User::all();

            // melakukan pengecekan method get
            if (isset($_GET['delete_id'])) {
                $deleteId = $_GET['delete_id'];

            User::deleteById('users', $deleteId);

            $_SESSION['success_message'] = "Berhasil melakukan penghapusan data user";

            // mengalihkan kehalaman index
            header("Location: index.php");
            exit();
                
            }
        ?>


        <div class="container">
            <!-- Card untuk Form Register -->
            <div class="card">
                <h2>Register</h2>
                <form action="" method="post">
                    <input type="text" name="name" placeholder="Name" required>
                    <input type="email" name="email" placeholder="Email" required>
                    <input type="text" name="address" placeholder="Address" required>
                    <select name="role" id="role" required>
                        <?php foreach (Role::roles as $key => $value) : ?>
                            <option value="<?= $value ?>"><?= $key ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                    <input type="submit" name="register" value="Register">
                </form>
            </div>

            <!-- Card untuk Tabel User -->
            <div class="card">
                <?php if (isset($_SESSION['success_message'])): ?>
                    <div id="message" class="message">
                        <?= $_SESSION['success_message']; ?>
                    </div>
                    <?php unset($_SESSION['success_message']); // Hapus pesan dari session setelah ditampilkan ?>
                <?php endif; ?>
                <h2>Data User</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(count($users) > 0): ?>
                            <?php foreach($users as $user): ?>
                                <tr>
                                    <td><?= $user['id']; ?> </td>
                                    <td><?= $user['name']; ?></td>
                                    <td><?= $user['email']; ?></td>
                                    <td><?= $user['address']; ?></td>
                                    <td><?= $user['role']; ?></td>
                                    <td>
                                        <a href="user-edit.php?id=<?= $user['id']; ?>">Edit</a> 
                                        <a href="#">view</a>
                                        <a href="index.php?delete_id=<?= $user['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No users found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    <script>
        // Script untuk menghilangkan pesan setelah 3 detik
        window.onload = function() {
            const message = document.getElementById('message');
            if (message) {
                message.style.display = 'block';
                setTimeout(function() {
                    message.style.display = 'none';
                }, 3000);
            }
        };
    </script>
</html>
