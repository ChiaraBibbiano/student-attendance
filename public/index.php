<?php

use tecgdcs\Router;

session_start();

require __DIR__ . '/../bootstrap/app.php';

require VENDOR_PATH . '/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();

new Router()->route();

