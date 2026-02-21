<?php include VIEWS_PATH .'/partials/head.php' ?>
<?php global $title ?>
<main class="page-main">
    <h1><?php echo $title ?></h1>
    <form action="" method="POST">
        <ol class="student-list">
            <?php foreach (getAllStudents() as $student): ?>
                <li>
                    <input id="<?php echo $student['id'] ?>" type="checkbox" name="students[]"
                           value="<?php echo $student['id'] ?>">
                    <label for="<?php echo $student['id'] ?>"><?php echo $student['first_name'] ?>
                        &nbsp;<?php echo $student['last_name'] ?></label>
                </li>
            <?php endforeach; ?>
        </ol>

        <button type="submit">Enregistrer les présences</button>
    </form>
    <button class="randomStudentBtn hidden">Choisir un·e étudiant·e</button>
    <p class="currentStudent hidden"></p>
</main>


<?php include VIEWS_PATH .'/partials/nav.php' ?>

<script defer src="/assets/js/main.js"></script>

<?php include VIEWS_PATH .'/partials/footer.php' ?>
