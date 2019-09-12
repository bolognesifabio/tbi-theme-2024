<?php get_header(); ?>

<main class="home">
    <?php include "views/public/pages/home/slider.php";
    
    get_sidebar('home-main');
    get_sidebar('home-sidebar'); ?>

    <tbi-vue-youtchouk></tbi-vue-youtchouk>
</main>

<?php get_footer(); ?>