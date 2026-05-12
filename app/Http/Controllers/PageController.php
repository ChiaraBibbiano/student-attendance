<?php

namespace App\Http\Controllers;
class PageController
{
    public function home(): void
    {
        $title = 'Page d’accueil';
        view('home', compact('title'));
    }
}