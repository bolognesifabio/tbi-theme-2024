<?php
$taxonomy_term_slug = $this->taxonomy_slug_prefix . '-' . $post_id;
$taxonomy_term = get_term_by('slug', $taxonomy_term_slug, $this->type_name);

if ($this->type_name != get_post_type($post_id) || $post->post_status == 'auto-draft') return;

if ($post->post_status == 'trash') {
    wp_delete_term($taxonomy_term->term_id, $this->type_name);
    return;
}

if ($taxonomy_term) {
    wp_update_term($taxonomy_term->term_id, $this->type_name, [
        'name' => $post->post_title,
        'slug' => $taxonomy_term_slug
    ]);
} else {
    wp_insert_term(
        $post->post_title, 
        $this->type_name,
        [
            'slug' => $taxonomy_term_slug
        ]
    );
}