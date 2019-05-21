<?php get_header(); ?>

<main id="tbi-vue">
    <?php include "views/home/carousel/main.php"; ?>

    <div class="row--boxed"> <?php
        get_sidebar('home-main');
        get_sidebar('left');
        get_sidebar('right'); ?>
    </div>

    <tbi-vue-youtchouk></tbi-vue-youtchouk>
</main>

<?php get_footer(); ?>


