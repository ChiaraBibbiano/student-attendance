<?php
function index() : void
{
    $title = 'Tous les étudiants';
    $students = getAllStudents();
    include VIEWS_PATH . '/students/index.php';
}
