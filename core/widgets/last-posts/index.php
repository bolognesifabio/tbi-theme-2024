<?php
namespace TBI\Widgets;

class LastPosts extends \WP_Widget {
    public function __construct() {
        $widget_ops = [
            'classname' => 'tbi_widget_last_posts',
            'description' => 'Articoli recenti',
        ];

        parent::__construct('tbi_widget_last_posts', 'TBI - Articoli recenti', $widget_ops);
    }

    public function widget($args, $instance) {
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
    }

    public function form($instance) {
        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('News', 'text_domain');
        $title_ID = esc_attr($this->get_field_id('title'));
        $title_name = esc_attr($this->get_field_name('title'));

        $instanceCategories = $instance['categories'] ? $instance['categories'] : [];
        $categories = get_categories();
        $category_name = esc_attr($this->get_field_name('categories')); ?>

        <p>
            <label for="<?= $title_ID ?>">
                <?php esc_attr_e( 'Titolo:', 'text_domain' ); ?>
            </label>
            <input class="widefat" id="<?= $title_ID ?>" name="<?= $title_name ?>" type="text" value="<?= esc_attr($title); ?>">
        </p>

        <p>
            <label>
                <?php esc_attr_e('Categorie:', 'text_domain'); ?>
            </label> <?php

            foreach($categories as $category) { ?>
                <br><input type="checkbox" <?= in_array($category->term_id, $instanceCategories) ? "checked" : "" ?> name="<?= $category_name ?>[]" value="<?= $category->term_id ?>" /><?= esc_html($category->name) ?> <?php
            } ?>
        </p>

        <?php
    }

    public function update($new_instance, $old_instance) {
        $instance = [];
        $instance['title'] = !empty($new_instance['title']) ? sanitize_text_field($new_instance['title']) : 'News';
        $instance['categories'] = !empty($new_instance['categories']) ? $new_instance['categories'] : null;

        return $instance;
    }
}

add_action('widgets_init', function() {
    register_widget('\TBI\Widgets\LastPosts');
});
