<?= $args['before_widget'] ?>
    <article class="tbi-last-posts">
        <?= $args['before_title'] ?>
            <?= $instance['title'] ?>
        <?= $args['after_title']; ?>

        <ul class="tbi-last-posts__list"> <?php
            $is_first_post = true;

            while(have_posts()) {
                the_post();
                $post_thumbnail_type = $is_first_post ? 'widget-last-posts-large' : 'widget-last-posts-small';
                $post_thumbnail = has_post_thumbnail() ? get_the_post_thumbnail_url(null, $post_thumbnail_type) : $tbi_logo_url;
                $is_first_post = false; ?>
                
                <li class="tbi-last-posts__list__item">
                    <div class="tbi-last-posts__list__item__thumbnail">
                        <img
                            class="tbi-last-posts__list__item__thumbnail__image"
                            src="<?= $post_thumbnail ?>"
                        />
                    </div>
                
                    <div class="tbi-last-posts__list__item__content">
                        <h3 class="tbi-last-posts__list__item__content__title">
                            <a href="<?php the_permalink(); ?>" class="tbi-last-posts__list__item__content__title__cta">
                                <?php the_title(); ?>
                            </a>
                        </h3>
                        <p class="tbi-last-posts__list__item__content__date">
                            <tbi-icon :icon="['far', 'calendar-alt']" class="tbi-last-posts__list__item__content__date__icon"></tbi-icon>
                            <?= get_the_date(); ?>
                        </p>
                    </div>
                </li> <?php
            } ?>
        </ul>

        <a class="tbi-last-posts__cta" href="#">
            Leggi altre news
            <tbi-icon icon="chevron-right" class="tbi-last-posts__cta__icon"></tbi-icon>
        </a>
    </article>
<?= $args['after_widget'] ?> <?php

wp_reset_query();