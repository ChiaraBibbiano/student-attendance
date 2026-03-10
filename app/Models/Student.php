<?php
namespace App\Models;
class Student
{
    static function getAllStudents(): ?array
    {
        try {
            return db_connection()->query('SELECT id, matricule, first_name, last_name, birth_date, profile_photo, email FROM students WHERE deleted_at IS NULL ORDER BY last_name, first_name')->fetchAll();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return null;
    }

    function getAllStudentWhereFirstNameContainsA(): ?array
    {
        try {
            return db_connection()->query("SELECT count(*)
                                 FROM students")->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return null;
    }


    function getStudent()
    {
        try {
            return db_connection()->query("SELECT *
FROM students WHERE first_name LIKE '%a%'")->fetch();

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}