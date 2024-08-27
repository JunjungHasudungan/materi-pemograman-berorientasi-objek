<?php
require_once 'models/User.php';

// Mengambil input dari request body JSON
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id'])) {
    $id = $data['id'];

    // Inisialisasi User dan panggil metode delete berdasarkan ID
    $user = new User();
    if ($user->deleteById('users', $id)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to delete user.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No ID provided.']);
}
?>
