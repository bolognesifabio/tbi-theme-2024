<?php
use TBI\Helpers\Widgets as Widgets_Helper; ?>

<?= $args['before_widget'] ?>
    <article class="widget--last-posts">
        <header class="widget__header"> <?php
            Widgets_Helper::render_title($args, $instance);
            Widgets_Helper::render_cta("Leggi altre news", "#"); ?>
        </header>

        <ul class="widget__list widget--last-posts__list"> <?php
            $is_first_post = true;

            while(have_posts()) {
                the_post();
                $post_thumbnail_type = $is_first_post ? 'widget-last-posts-large' : 'widget-last-posts-small';
                $post_thumbnail_placeholder = get_template_directory_uri() . '/assets/img/' . $post_thumbnail_type . '.png';
                $post_thumbnail = get_the_post_thumbnail_url(null, $post_thumbnail_type) ?: $post_thumbnail_placeholder;
                $is_first_post = false; ?>
                
                <li class="widget__list__item widget--last-posts__list__item">
                    <a href="<?php the_permalink(); ?>" class="widget--last-posts__list__item__inner">
                        <div class="widget--last-posts__list__item__inner__thumbnail">
                            <img
                                class="widget--last-posts__list__item__inner__thumbnail__image"
                                src="<?= $post_thumbnail ?>"
                            />
                        </div>
                    
                        <div class="widget--last-posts__list__item__inner__content">
                            <h3 class="widget--last-posts__list__item__inner__content__title">
                                <?php the_title(); ?>
                            </h3>
                            <p class="widget--last-posts__list__item__inner__content__date">
                                <tbi-icon :icon="['far', 'calendar-alt']" class="widget--last-posts__list__item__inner__content__date__icon"></tbi-icon>
                                <?= get_the_date(); ?>
                            </p>
                        </div>
                    </a>
                </li> <?php
            } ?>
        </ul>

        <footer class="widget__footer"> <?php
            Widgets_Helper::render_cta("Leggi altre news", "#"); ?>
        </footer>
        <!-- @TODO: link to index.php with multiple categories -->
    </article>
<?= $args['after_widget'] ?> <?php

wp_reset_query();