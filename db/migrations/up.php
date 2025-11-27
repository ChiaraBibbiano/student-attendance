<?php
require_once '../connexion.php';

function up()
{
    try {
        global $pdo;
        $sql = <<<sql
CREATE TABLE school_years
(
    id              BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(50) NOT NULL UNIQUE,
    starts_at       DATE        NULL,
    ends_at         DATE        NULL,
    is_current_year BOOLEAN          DEFAULT FALSE,
    created_at      TIMESTAMP   NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at      TIMESTAMP   NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at      TIMESTAMP   NULL DEFAULT NULL
);

CREATE TABLE teachers
(
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(100) NOT NULL,
    last_name  VARCHAR(100) NOT NULL,
    email      VARCHAR(150) UNIQUE,
    phone      VARCHAR(30),
    created_at TIMESTAMP    NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP    NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP    NULL DEFAULT NULL
);

CREATE TABLE ues
(
    id                     BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code                   VARCHAR(50)      NOT NULL,
    school_year_id         BIGINT UNSIGNED  NOT NULL,
    credits                TINYINT UNSIGNED NOT NULL CHECK (credits <= 60),
    title                  VARCHAR(255)     NOT NULL,
    description            TEXT             NULL,
    responsible_teacher_id BIGINT UNSIGNED  NOT NULL,
    created_at             TIMESTAMP        NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at             TIMESTAMP        NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at             TIMESTAMP        NULL DEFAULT NULL,

    UNIQUE (code, school_year_id),

    FOREIGN KEY (school_year_id) REFERENCES school_years (id)
        ON DELETE RESTRICT ON UPDATE CASCADE,

    FOREIGN KEY (responsible_teacher_id) REFERENCES teachers (id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE aas
(
    id             BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code           VARCHAR(50)       NOT NULL,
    ue_id          BIGINT UNSIGNED   NOT NULL,
    school_year_id BIGINT UNSIGNED   NOT NULL,
    title          VARCHAR(255)      NOT NULL,
    hours_per_year SMALLINT UNSIGNED NOT NULL DEFAULT 0,
    quadrimester   TINYINT UNSIGNED  NOT NULL,
    created_at     TIMESTAMP         NULL     DEFAULT CURRENT_TIMESTAMP,
    updated_at     TIMESTAMP         NULL     DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at     TIMESTAMP         NULL     DEFAULT NULL,

    UNIQUE (code, ue_id, school_year_id),

    FOREIGN KEY (ue_id) REFERENCES ues (id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    FOREIGN KEY (school_year_id) REFERENCES school_years (id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE aa_teacher
(
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    aa_id      BIGINT UNSIGNED NOT NULL,
    teacher_id BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP       NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP       NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP       NULL DEFAULT NULL,

    UNIQUE (aa_id, teacher_id),

    FOREIGN KEY (aa_id) REFERENCES aas (id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    FOREIGN KEY (teacher_id) REFERENCES teachers (id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE `groups`
(
    id             BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code           VARCHAR(50)     NOT NULL,
    school_year_id BIGINT UNSIGNED NOT NULL,
    created_at     TIMESTAMP       NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at     TIMESTAMP       NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at     TIMESTAMP       NULL DEFAULT NULL,

    UNIQUE (code, school_year_id),

    FOREIGN KEY (school_year_id) REFERENCES school_years (id)
        ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE classrooms
(
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name       VARCHAR(50) NOT NULL UNIQUE,
    created_at TIMESTAMP   NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP   NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP   NULL DEFAULT NULL
);

CREATE TABLE students
(
    id            BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    matricule     VARCHAR(100) NOT NULL UNIQUE,
    first_name    VARCHAR(120) NOT NULL,
    last_name     VARCHAR(120) NOT NULL,
    birth_date    DATE              DEFAULT (DATE_SUB(CURRENT_DATE(), INTERVAL 18 YEAR)),
    profile_photo VARCHAR(1024),
    email         VARCHAR(200) NOT NULL UNIQUE,
    created_at    TIMESTAMP    NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at    TIMESTAMP    NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at    TIMESTAMP    NULL DEFAULT NULL
);

CREATE TABLE sessions
(
    id             BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    aa_id          BIGINT UNSIGNED NOT NULL,
    title          VARCHAR(255),
    teacher_id     BIGINT UNSIGNED NOT NULL,
    starts_at      DATETIME        NOT NULL,
    ends_at        DATETIME        NULL,
    classroom_id   BIGINT UNSIGNED NOT NULL,
    created_at     TIMESTAMP       NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at     TIMESTAMP       NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at     TIMESTAMP       NULL DEFAULT NULL,

    UNIQUE (aa_id, classroom_id, starts_at),

    FOREIGN KEY (aa_id) REFERENCES aas (id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    FOREIGN KEY (teacher_id) REFERENCES teachers (id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    FOREIGN KEY (classroom_id) REFERENCES classrooms (id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE session_group
(
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    session_id BIGINT UNSIGNED NOT NULL,
    group_id   BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP       NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP       NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP       NULL DEFAULT NULL,

    UNIQUE (session_id, group_id),

    FOREIGN KEY (session_id) REFERENCES sessions (id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    FOREIGN KEY (group_id) REFERENCES `groups` (id)
        ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE student_group
(
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    student_id BIGINT UNSIGNED NOT NULL,
    group_id   BIGINT UNSIGNED NOT NULL,
    created_at TIMESTAMP       NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP       NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP       NULL DEFAULT NULL,

    UNIQUE (student_id, group_id),

    FOREIGN KEY (student_id) REFERENCES students (id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    FOREIGN KEY (group_id) REFERENCES `groups` (id)
        ON DELETE CASCADE ON UPDATE CASCADE
);


CREATE TABLE attendances
(
    id         BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    session_id BIGINT UNSIGNED NOT NULL,
    student_id BIGINT UNSIGNED NOT NULL,
    is_present BOOLEAN         NOT NULL DEFAULT FALSE,
    checked_at DATETIME        NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    note       TEXT            NULL,
    created_at TIMESTAMP       NULL     DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP       NULL     DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP       NULL     DEFAULT NULL,

    UNIQUE (session_id, student_id),

    FOREIGN KEY (session_id) REFERENCES sessions (id)
        ON DELETE CASCADE ON UPDATE CASCADE,

    FOREIGN KEY (student_id) REFERENCES students (id)
        ON DELETE CASCADE ON UPDATE CASCADE
);

sql;

        $pdo->exec($sql);
    } catch (PDOException $e) {
        echo "Erreur lors de la récupération des données : " . $e->getMessage();
    }
}

up();
