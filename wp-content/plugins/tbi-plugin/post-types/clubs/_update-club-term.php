<?php
$club_slug = 'club-'.$post_id;
$club_term = get_term_by('slug', $club_slug, 'clubs');

if ('clubs' != get_post_type($post_id) || $post->post_status == 'auto-draft') return;

if ($post->post_status == 'trash') {
    wp_delete_term($club_term->term_id, 'clubs');
    return;
}

if ($club_term) {
    wp_update_term($club_term->term_id, 'clubs', [
        'name' => $post->post_title,
        'slug' => $club_slug
    ]);
} else {
    wp_insert_term(
        $post->post_title, 
        'clubs',
        [
            'slug' => $club_slug
        ]
    );
}