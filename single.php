<?php get_header(); ?>
<?php the_post(); ?>

<main>
    <div class="row--boxed">
        <div class="single__main">
            <h1 class="single__main__title"><?php the_title(); ?></h1>
            <p class="single__main__date"><i class="far fa-calendar-alt"></i> <?php the_date(); ?></p> <?php
            if (has_post_thumbnail()) { ?>
                <img class="single__main__thumbnail" src="<?= get_the_post_thumbnail_url(get_the_ID()) ?>"/> <?php
            } ?>
            <div class="single__main__content"><?php the_content(); ?></div>
        </div> <?php
        get_sidebar('right'); ?>
    </div>
</main>

<?php get_footer(); ?>
