<?php

const PUBLIC_PATH = __DIR__;
const APP_PATH = PUBLIC_PATH . '/..';
const DB_PATH = APP_PATH . '/db';
const VENDOR_PATH = APP_PATH . '/vendor';
const VIEWS_PATH = APP_PATH . '/views';

require VENDOR_PATH . '/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(APP_PATH); //charge les info qui sont dans le fichier
$dotenv->load();

include DB_PATH . '/queries.php';

$title = '';

switch ($_SERVER['REQUEST_URI']) {
    case '':
    case '/':
        $title = 'Page d’accueil';
        include VIEWS_PATH . '/home.php';
        break;
    case '/presences':
        $title = 'Prendre les présences';
        include VIEWS_PATH . '/attendances/index.php';
        break;
    case '/etudiants':
        $title = 'Tous les étudiants';
        include VIEWS_PATH . '/students/index.php';
        break;
    default:
        $title = '404';
        include VIEWS_PATH . '/404.php';
}