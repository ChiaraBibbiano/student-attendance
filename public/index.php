<?php

require __DIR__ . '/../boodstrap/app.php';

require VENDOR_PATH . '/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(ROOT_PATH); //charge les info qui sont dans le fichier
$dotenv->load();




switch ($_SERVER['REQUEST_URI']) {
    case '':
    case '/':
        require CONTROLLERS_PATH . '/PageController.php';
        home();
        break;
    case '/presences':
        require CONTROLLERS_PATH . '/AttendanceController.php';
        index();
        break;
    case '/etudiants':
        require CONTROLLERS_PATH . '/StudentController.php';
        index();
        break;
    default:
        $title = '404';
        include VIEWS_PATH . '/404.php';
}