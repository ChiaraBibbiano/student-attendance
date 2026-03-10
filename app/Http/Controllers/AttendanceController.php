<?php
function index() : void
{
    require MODELS_PATH . '/Student.php';
    $title = 'Prendre les présences';
    $students = getAllStudents();
    include VIEWS_PATH . '/attendances/index.php';
}
