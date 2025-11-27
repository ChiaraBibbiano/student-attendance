<?php
require_once '../connexion.php';

function down()
{
    global $pdo;

    try {
        $sql = <<<sql
    DROP TABLE IF EXISTS attendances;
    DROP TABLE IF EXISTS student_group;
    DROP TABLE IF EXISTS session_group;
    DROP TABLE IF EXISTS sessions;
    DROP TABLE IF EXISTS `groups`;
    DROP TABLE IF EXISTS classrooms;
    DROP TABLE IF EXISTS aa_teacher;
    DROP TABLE IF EXISTS aas;
    DROP TABLE IF EXISTS ues;
    DROP TABLE IF EXISTS students;
    DROP TABLE IF EXISTS teachers;
    DROP TABLE IF EXISTS school_years;
sql;

        $pdo->exec($sql);
    } catch (PDOException $exception) {
        echo $exception->getMessage();
    }
}

down();
