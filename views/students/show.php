<?php view('partials.head', compact('title')) ?>
    <main class="page-main">
        <h1><?= $title ?></h1>

        <dl>
            <div>
                <dt>Prénom</dt>
                <dd><?= $student->first_name ?></dd>
            </div>
            <div>
                <dt>Nom de famille</dt>
                <dd><?= $student->last_name ?></dd>
            </div>
            <div>
                <dt>Matricule</dt>
                <dd><?= $student->matricule ?></dd>
            </div>
            <div>
                <dt>Email</dt>
                <dd><a href="mailto: <?= $student->email ?>"><?= $student->email ?></a></dd>
            </div>
            <?php if($student->birth_date): ?>
                <div>
                    <dt>Date de naissance</dt>
                    <dd><time datetime="<?= $student->birth_date ?>"><?= $student->birth_date ?></time></dd>
                </div>
            <?php endif; ?>
            <?php if($student->profile_photo): ?>
                <div>
                    <dt>Photo de profil</dt>
                    <dd><img src="<?= $student->profile_photo ?>"
                             alt="Portrait de <?= $student->first_name ?> <?= $student->last_name ?>"></dd>
                </div>
            <?php endif; ?>
        </dl>
        <div>
            <a href="/etudiants" class="action">Voir tous les étudiants</a>
        </div>

    </main>


<?php view('partials.nav') ?>


<?php view('partials.footer') ?><?php
