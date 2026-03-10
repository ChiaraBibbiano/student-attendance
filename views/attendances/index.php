<?php include VIEWS_PATH . '/partials/head.php' ?>
    <main class="page-main">
        <h1><?= $title ?></h1>
        <form action="" method="POST">
            <ol class="student-list">
                <?php foreach ($students as $student): ?>
                    <li>
                        <input id="<?= $student['id'] ?>" type="checkbox" name="students[]"
                               value="<?= $student['id'] ?>">
                        <label for="<?= $student['id'] ?>"><?= $student['first_name'] ?>
                            &nbsp;<?= $student['last_name'] ?></label>
                    </li>
                <?php endforeach; ?>
            </ol>

            <button type="submit">Enregistrer les présences</button>
        </form>
        <button class="randomStudentBtn hidden">Choisir un·e étudiant·e</button>
        <p class="currentStudent hidden"></p>
    </main>


<?php include VIEWS_PATH . '/partials/nav.php' ?>

    <script defer src="/assets/js/main.js"></script>

<?php include VIEWS_PATH . '/partials/footer.php' ?>