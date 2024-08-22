<?php

class Database
{
    private static $connection;

    public static function getConnection()
    {
        if (!self::$connection) {
            $config = require 'config.php';

            $dsn = 'mysql:host=' . $config['db_host'] . ';dbname=' . $config['db_name'];
            $username = $config['db_user'];
            $password = $config['db_pass'];
            $options = $config['db_options'];

            try {
                self::$connection = new PDO($dsn, $username, $password, $options);
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }

        return self::$connection;
    }
}
