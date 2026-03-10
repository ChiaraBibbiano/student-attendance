<?php

require __DIR__ . '/../bootstrap/app.php';

require VENDOR_PATH . '/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();


switch ($_SERVER['REQUEST_URI']) {
    case '':
    case '/':
        \App\Http\Controllers\PageController::home();
        break;
    case '/presences':
        \App\Http\Controllers\AttendanceController::index();
        break;
    case '/etudiants':
        \App\Http\Controllers\StudentController::index();
        break;
    default:
        $title = '404';
        include VIEWS_PATH . '/404.php';
}