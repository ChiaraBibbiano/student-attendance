<nav class="page-nav" aria-labelledby="main-nav-id">
    <h2 class="hidden" id="main-nav-id">navigation principale</h2>
    <ul>
        <li><a class="<?= $_SERVER['REQUEST_URI'] == '/' || $_SERVER['REQUEST_URI'] == '' ? 'active' : '' ?>"
               href="/">Accueil</a></li>
        <li><a class="<?= $_SERVER['REQUEST_URI'] == '/presences' ? 'active' : '' ?>"
               href="/presences">Présences</a>
        </li>
        <li><a class="<?= $_SERVER['REQUEST_URI'] == '/etudiants' ? 'active' : '' ?>"
               href="/etudiants">Étudiants</a></li>
    </ul>
</nav>