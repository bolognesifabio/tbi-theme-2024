<?php
$query_args = [];
$query_args['posts_per_page'] = 5;
!$instance['categories'] || $query_args['category__in'] = $instance['categories'];
$tbi_logo_url = get_template_directory_uri() . '/assets/img/tbi-logo.png';

query_posts($query_args); ?>

<?= $args['before_widget'] ?>
    <div class="tbi-widget-news widget__content">
        <?= $args['before_title'] ?>
            <?= $instance['title'] ?>
        <?= $args['after_title']; ?>

        <ul class="tbi-widget-news__list widget__content__list"> <?php
            while(have_posts()) {
                the_post(); ?>
                <a href="<?php the_permalink(); ?>">
                    <li class="tbi-widget-news__list__article">
                        <div class="tbi-widget-news__list__article__thumbnail">
                            <img src="<?= has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'thumbnail') : $tbi_logo_url ?>" />
                        </div>
                        <div class="tbi-widget-news__list__article__content">
                            <h3 class="tbi-widget-news__list__article__content__title"><?php the_title(); ?></h3>
                            <p class="tbi-widget-news__list__article__content__date"><i class="far fa-calendar-alt"></i> <?= get_the_date(); ?></p>
                        </div>
                    </li>
                </a> <?php
            } ?>
        </ul>
    </div>
<?= $args['after_widget'] ?>

<?php
wp_reset_query();
