<?php $carousel_category = get_category_by_slug('tbi-slider');

$carousel_posts = get_posts([
    'numberposts' => 5,
    'category' => $carousel_category->cat_ID,
    'orderby' => 'date',
    'order' => 'DESC'
]);

$carousel_data = array_map(function($post) {
    return [
        "id" => $post->ID,
        "title" => $post->post_title,
        "img" => get_the_post_thumbnail_url($post->ID),
        "url" => get_permalink($post->ID)
    ];
}, $carousel_posts); ?>
<tbi-vue-home-carousel data-slides='<?= json_encode($carousel_data) ?>'></tbi-vue-home-carousel>