<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Registration</title>
    <link rel ="stylesheet" href="assets/css/style.css"/>  
    <script src="assets/js/helper.js"></script>
</head>
    <body>
        <?php 

            require_once __DIR__ . '/autoload.php';

            use App\Helper\Role;
            use App\Models\User;
            use App\Controllers\UserController;
            use App\Utilities\ValidateRequest as Request;

            session_start(); 

            $errors = [
                'name' => '',
                'email' => '',
                'address' => ''
            ];
            $userController = new UserController();
                        
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $userRequest = new Request($_POST);
                try {
                    $userController->store($userRequest);
                } catch (Exception $e) {
                    $errors = json_decode($e->getMessage(), true);
                }
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $role = $_POST['role'];
                $user = new User(null, $name, $email, $address, $role);
                $user->register();
            }

            $users = User::all();
            
            if (isset($_GET['delete_id'])) {
                $deleteId = $_GET['delete_id'];
                User::deleteById('users', $deleteId);
                $_SESSION['success_message'] = "Berhasil melakukan penghapusan data user";
                // header("Location: index.php");
                // exit();
            }

        ?>
        <div class="container">
            <!-- Card untuk Form Register -->
            <div class="card">
                <h2>Register</h2>
                <form action="" method="post">
                    <input type="text" name="name" placeholder="Name">
                    <?php if (!empty($errors['name'])): ?>
                        <div style="color: red;"><?= htmlspecialchars($errors['name']) ?></div>
                    <?php endif; ?>
                    <br><br>

                    <input type="email" name="email" placeholder="Email">
                    <?php if (!empty($errors['name'])): ?>
                        <div style="color: red;"><?= htmlspecialchars($errors['name']) ?></div>
                    <?php endif; ?>
                    <br><br>

                    <input type="text" name="address" placeholder="Address">
                    <?php if (!empty($errors['name'])): ?>
                        <div style="color: red;"><?= htmlspecialchars($errors['name']) ?></div>
                    <?php endif; ?>
                    <br><br>

                    <select name="role" id="role">
                        <?php foreach (Role::roles as $key => $value) : ?>
                            <option value="<?= $value ?>"><?= $key ?></option>
                        <?php endforeach; ?>
                    </select><br><br>
                    <input type="submit" id="btn-register" 
                    name="register" value="Register">
                </form>
            </div>

            <!-- Card untuk Tabel User -->
            <div class="card">
            <?php include 'display-messages/success-delete.php'; ?>
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
                                    <td><?= htmlspecialchars($user['id']); ?> </td>
                                    <td><?= htmlspecialchars($user['name']); ?></td>
                                    <td><?= htmlspecialchars($user['email']); ?></td>
                                    <td><?= htmlspecialchars($user['address']); ?></td>
                                    <td><?= htmlspecialchars($user['role']); ?></td>
                                    <td>
                                        <a href="user-edit.php?id=<?= htmlspecialchars($user['id']); ?>">Edit</a> 
                                        <a href="#">view</a>
                                        <a href="index.php?delete_id=<?= htmlspecialchars($user['id']); ?>" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
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
</html>
