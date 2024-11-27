<?php

spl_autoload_register(function ($class) {

    $base_dir = __DIR__ . '/App/';

    $relative_class = preg_replace('/^App\\\\/', '', $class);
    $relative_class = str_replace('\\', '/', $relative_class);

    $file = $base_dir . $relative_class . '.php';

    if (file_exists($file)) {
        require_once $file;
    } else {
        var_dump($class);
        echo "File not found: $file <br>"; 
    }
});
