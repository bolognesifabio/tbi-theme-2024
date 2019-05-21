<?php get_header(); ?>

<main class="box_width" id="tbi-vue">
    <div class="not-found row--boxed">
        <i class="fas fa-map-signs not-found__icon"></i>
        <h1 class="not-found__title">Pagina non trovata</h1>
        <h2 class="not-found__text">La pagina che stai cercando non esiste o non è disponibile.</h1>
        <a class="not-found__link" href="<?= home_url() ?>">Torna alla home</a>
    </div>
</main>

<?php get_footer(); ?>
