<?php view('partials.head', compact('title')) ?>
    <main class="page-main">
        <h1><?= $title ?></h1>

        <?php if (count($students) > 0): ?>
            <ol>
                <?php foreach ($students as $student): ?>
                    <li>
                        <?= $student['first_name'] ?>
                        &nbsp;<?= $student['last_name'] ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        <?php else: ?>
            <p>Mais où sont-ils&nbsp;?</p>
        <?php endif; ?>
        <div>
            <a href="/etudiants/create" class="action">Ajouter un étudiant</a>
        </div>

    </main>


<?php view('partials.nav') ?>


<?php view('partials.footer') ?>