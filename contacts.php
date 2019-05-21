<?php /* Template Name: Contatti */ ?>

<?php get_header(); ?>

<main class="box_width" id="tbi-vue">
    <div class="contacts row--boxed">
        <aside class="contacts__list">
            <h1 class="contacts__list__title">Contatti</h1>
            <dl class="contacts__list__details">
                <dt>Sede legale</dt>
                <dd><i class="fas fa-map-marker-alt"></i> via Parini, 54 - 21047 Saronno (VA) Italia</dd>
                <dd><i class="fas fa-envelope"></i> segreteria@tchoukball.it</dd>
                <dd><i class="fas fa-envelope"></i> federazione@tchoukball.it</dd>
            </dl>
        </aside>

        <tbi-vue-contacts-form></tbi-vue-contacts-form>
    </div>
</main>

<?php get_footer(); ?>