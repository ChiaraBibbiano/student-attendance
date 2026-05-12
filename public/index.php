<?php

require __DIR__ . '/../bootstrap/app.php';

require VENDOR_PATH . '/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH);
$dotenv->load();

switch ($_SERVER['REQUEST_URI']) {
    case '':
    case '/':
        new \App\Http\Controllers\PageController()->home();
        break;
    case '/presences':
       new \App\Http\Controllers\AttendanceController()->index();
        break;
    case '/etudiants':
       new \App\Http\Controllers\StudentController()->index();
        break;
    case '/etudiants/create':
        new \App\Http\Controllers\StudentController()->create();
        break;
    default:
        $title = '404';
        include VIEWS_PATH . '/404.php';
}