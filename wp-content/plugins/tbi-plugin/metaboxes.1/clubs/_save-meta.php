<?php
if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return $post_id;

if (get_post_type($post_id) === 'clubs') {
    $input_names_keys = ['city', 'province', 'address', 'phone', 'email', 'website'];
    $club_contacts = [];

    foreach ($input_names_keys as $key) {
        $club_contacts[$key] = $_POST['tbi-club-' . $key] ?: "";
    }
    
    update_post_meta($post_id, 'tbi-clubs-contacts', $club_contacts);
}