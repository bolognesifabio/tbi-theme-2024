<?php
namespace TBI\Controllers\Pages;

class Home {
    public function slider() {
        $slider_category = get_category_by_slug('tbi-slider');
        $slider_posts = get_posts([
            'numberposts' => 5,
            'category' => $slider_category->cat_ID,
            'orderby' => 'date',
            'order' => 'DESC'
        ]);

        return array_map(function($slider_post, $is_not_first) {
            return [
                "id" => $slider_post->ID,
                "title" => $slider_post->post_title,
                "img" => get_the_post_thumbnail_url($slider_post->ID),
                "url" => get_permalink($slider_post->ID),
                "is_active" => $is_not_first ? false : true
            ];
        }, $slider_posts, array_keys($slider_posts));
    }
}