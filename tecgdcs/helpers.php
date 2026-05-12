<?php

use JetBrains\PhpStorm\NoReturn;

if (!function_exists('dd')) {
    #[NoReturn]
    function dd(...$vars): void
    {
        foreach ($vars as $var) {
            var_dump($var);
            echo PHP_EOL;
        }
        die();
    }
}

if (!function_exists('env')) {
    function env(string $key, $default = null): mixed
    {
        return $_ENV[$key] ?? $default;
    }
}

if (!function_exists('db_connection')) {
    function db_connection(): ?PDO
    {
        $connection = env('DB_CONNECTION');
        $host = env('DB_HOST');
        $db_name = env('DB_DATABASE');
        $user = env('DB_USERNAME');
        $pass = env('DB_PASSWORD');
        $charset = env('DB_CHARSET');

        $dsn = "$connection:host=$host;dbname=$db_name;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];


        try {
            return new PDO($dsn, $user, $pass, $options);
        } catch (PDOException $e) {
            echo 'Erreur de connexion : ' . $e->getMessage();
        }

        return null;
    }
}

