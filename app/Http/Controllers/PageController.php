<?php

namespace App\Http\Controllers;
class PageController
{
    static function home(): void
    {
        $title = 'Page d’accueil';
        view('home', compact('title'));
    }
}