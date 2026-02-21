<?php
require 'vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__); //charge les info qui sont dans le fichier
$dotenv->load();

include 'db/queries.php';

$title = '';


switch ($_SERVER['REQUEST_URI']) {
    case '':
    case '/':
        $title = 'Page d’accueil';
        include './views/home.php';
        break;
    case '/presences':
        $title = 'Prendre les présences';
        include './views/attendances/index.php';
        break;
    case '/etudiants':
        $title = 'Tous les étudiants';
        include './views/students/index.php';
        break;
    default:
        $title = '404';
        include './views/404.php';
}
