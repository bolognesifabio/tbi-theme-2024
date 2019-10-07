<?php get_header(); ?>

<main class="home">
    <?php include "views/public/pages/home/slider.php"; ?>
    
    <div class="layout-row"> <?php
        get_sidebar('home-main');
        get_sidebar('home-sidebar'); ?>
    </div>

    <?php include "views/public/pages/home/youtchouk.php"; ?>
</main>

<?php get_footer(); ?>