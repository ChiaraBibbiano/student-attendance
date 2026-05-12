<?php view('partials.head', compact('title')) ?>
    <main class="page-main">
        <h1><?= $title ?></h1>
        <section class="resource-actions">
            <h2 class="sr-only">Actions relatives à <?= $student->first_name ?> <?= $student->last_name ?></h2>
            <ul>
                <li>
                    <a href="/etudiant/edit?id=<?= $student->id ?>">Modifier <?= $student->first_name ?></a>
                </li>
                <li>
                    <form action="/etudiant" method="post">
                        <input type="hidden" name="_method" value="delete">
                        <input type="hidden" name="_token" value="<?= csrf_token() ?>">
                        <input type="hidden" name="id" value="<?= $student->id ?>">
                        <button type="submit">Supprimer <?= $student->first_name ?></button>
                    </form>
                </li>
            </ul>
        </section>

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
