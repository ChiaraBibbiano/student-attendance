<?php

namespace App\Http\Controllers;

use App\Models\Student;

class StudentController
{
    public function index(): void
    {
        $title = 'Tous les étudiants';
        $students = Student::getAllStudents();
        view(
            'students.index',
            compact('title', 'students')
        );
    }
    public function create(): void
    {
        $title = 'Ajouter un étudiant';

        view(
            'students.create',
            compact('title')
        );
    }
    public function store(): void
    {
        //stocker un étudiant dans la db
        //demander au navigateur de se rediger vers la page de résultat souhaitée
        $this->check_csrf();
        // Valider les données associées à la requête

        // Stocker un étudiant en DB
        $student = new Student();

        $student->first_name = $_POST['first_name'];
        $student->last_name = $_POST['last_name'];
        $student->email = $_POST['email'];
        $student->matricule = $_POST['matricule'];
        $student->birth_date = empty($_POST['birth_date']) ? null : $_POST['birth_date'];

        $student->save();

        // Demander au navigateur de se rediriger vers la page de résultat souhaitée
        Response::redirect('Location: /etudiant?id=' . $student->id);
    }
    public function show()
    {
        // Validation
        if(!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            die('Bad Request');
        }
        // Sanitisation / Nettoyage | Préparation
        $id = (int)$_GET['id'];


        //récup les données
        $student = Student:: find($id);

        $title = 'La fiche de ' . $student->first_name;

        view('students.show',
            compact(
                'title',
                'student'
            )
        );
    }



}
