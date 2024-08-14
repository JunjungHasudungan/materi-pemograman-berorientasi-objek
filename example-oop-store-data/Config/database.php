<?php

$db_name = 'mysql:host=localhost;dbname=example-demo-galeri-photo';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($db_name, $username, $password, $options);
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
    die();
}