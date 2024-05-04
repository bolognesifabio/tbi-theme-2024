<?php get_header(); ?>

<main class="article">
    <div class="row--boxed">
        <div class="single__main">
            <h1 class="single__main__title"><?php the_title(); ?></h1>
            <p class="single__main__date"><i class="far fa-calendar-alt"></i> <?php the_date(); ?></p>
            <div class="single__main__content"><?php the_content(); ?></div>
        </div>
    </div>
</main>

<?php get_footer(); ?>