<?php

namespace App\Http\Controllers;

use App\Models\Student;

class AttendanceController
{
    static function index(): void
    {
        $title = 'Prendre les présences';
        $students = Student::getAllStudents();
        view(
            'attendances.index',
            compact('title', 'students')
        );
    }
}