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