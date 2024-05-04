<?php get_header(); ?>

<main class="box_width">
    <div class="row--boxed"> <?php
        the_post(); ?>
        <div class="single__main">
            <h1 class="single__main__title"><?php the_title(); ?></h1>
            <h2><?= $_GET['competition'] ?></h2>
            <h2><?= get_query_var('competition') ?></h2>
            <p class="single__main__content"><?php the_content(); ?></p>
        </div> <?php
        get_sidebar('right'); ?>
    </div>
</main>

<?php get_footer(); ?>
