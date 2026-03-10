<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController
{
    static function index(): void
    {
        $title = 'Tous les étudiants';
        $students = Student::getAllStudents();
        
    }
}