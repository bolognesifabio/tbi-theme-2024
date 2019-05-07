<?php
$is_doing_autosave = defined('DOING_AUTOSAVE') && DOING_AUTOSAVE;
$is_post_type_valid = in_array(get_post_type($post_id), $this->post_types);

$post_meta = isset($_POST[$this->meta_name]) ? $_POST[$this->meta_name] : null;
$post_terms = isset($_POST[$this->meta_name . '-term']) ? $_POST[$this->meta_name . '-term'] : null;

if ($is_doing_autosave) return $post_id;

if ($is_post_type_valid && $post_meta) update_post_meta($post_id, $this->meta_name, $_POST[$this->meta_name]);

if ($is_post_type_valid && $post_terms) {
    foreach ($post_terms as $taxonomy => $term) wp_set_post_terms($post_id, $term, $taxonomy);
}