<?php

spl_autoload_register(function ($class) {

    $base_dir = __DIR__ . '/App/';

    $relative_class = preg_replace('/^App\\\\/', '', $class);
    $relative_class = str_replace('\\', '/', $relative_class);

    // Buat path file lengkap dari base directory.
    $file = $base_dir . $relative_class . '.php';


    // Jika file tersebut ada, load file tersebut.
    if (file_exists($file)) {
        require_once $file;
    } else {
        var_dump($class);
        echo "File not found: $file <br>"; // Untuk debug jika file tidak ditemukan.
    }
});
