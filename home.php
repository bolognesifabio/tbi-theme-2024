<?php get_header(); ?>

<main class="home">
    <?php include "views/public/pages/home/slider.php"; ?>
    
    <div class="layout-row"> <?php
        get_sidebar('home-main');
        get_sidebar('home-sidebar'); ?>
    </div>

    <tbi-vue-youtchouk></tbi-vue-youtchouk>
</main>

<?php get_footer(); ?>