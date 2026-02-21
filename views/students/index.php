<?php include VIEWS_PATH . '/partials/head.php' ?>

<?php global $title ?>
<main class="page-main">
    <h1><?php echo $title ?></h1>
    <?php $students = getAllStudents(); ?>

    <?php if (count($students) > 0): ?>
        <ol>
            <?php foreach (getAllStudents() as $student): ?>
                <li>
                    <?php echo $student['first_name'] ?>
                    &nbsp;<?php echo $student['last_name'] ?>
                </li>
            <?php endforeach; ?>
        </ol>
    <?php else: ?>
        <p>Mais où sont-ils&nbsp;?</p>
    <?php endif; ?>

</main>


<?php include VIEWS_PATH . '/partials/nav.php' ?>


<?php include VIEWS_PATH . '/partials/footer.php' ?>
