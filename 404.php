<?php get_header(); ?>

<main class="box_width container" id="tbi-vue">
    <div class="not-found row--boxed">
        <h1 class="not-found__title">Pagina non trovata</h1>
        <h2 class="not-found__text">La pagina che stai cercando non esiste o non è disponibile.</h1><br/>
        <a class="not-found__link" href="<?= home_url() ?>">Torna alla home</a>
    </div>
</main>

<?php get_footer(); ?>
