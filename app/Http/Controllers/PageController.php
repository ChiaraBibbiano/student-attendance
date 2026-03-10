<?php


namespace App\Http\Controllers;
class PageController
{
     static function home() : void
    {
        $title = 'Page d’accueil';
        include VIEWS_PATH . '/home.php';
    }
}

