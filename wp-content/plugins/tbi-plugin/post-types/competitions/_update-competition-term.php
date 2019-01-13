<?php
$competition_slug = 'competition-'.$post_id;
$competition_term = get_term_by('slug', $competition_slug, 'competitions');

if ('competitions' != get_post_type($post_id) || $post->post_status == 'auto-draft') return;

if ($post->post_status == 'trash') {
    wp_delete_term($competition_term->term_id, 'competitions');
    return;
}

if ($competition_term) {
    wp_update_term($competition_term->term_id, 'competitions', [
        'name' => $post->post_title,
        'slug' => $competition_slug
    ]);
} else {
    wp_insert_term(
        $post->post_title, 
        'competitions',
        [
            'slug' => $competition_slug
        ]
    );
}