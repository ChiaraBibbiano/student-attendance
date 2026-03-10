<?php
function home() : void
{
    require MODELS_PATH . '/Student.php';
    $title = 'Page d’accueil';
    include VIEWS_PATH . '/home.php';
}
