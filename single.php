<?php get_header(); ?>

<main class="single__articles">
    <div class="single__articles__header">
        <div class="single__articles__header__container">
            <img src="<?php the_post_thumbnail_url(); ?>" />
            <div class="container">
                <h1 class="single__articles__header__container__title"><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
    <div class="single__articles__content container">
        <?php the_content(); ?>
    </div>
</main>

<?php get_footer(); ?>