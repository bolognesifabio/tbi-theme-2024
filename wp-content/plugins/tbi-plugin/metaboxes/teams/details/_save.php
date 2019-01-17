<?php
if (get_post_type($post_id) === 'teams') {
    $input_name_prefix = 'tbi-metaboxes-teams-details-';
    $meta_keys = ['short-name', 'team-code', 'active'];
    $meta_value = [];

    foreach ($meta_keys as $meta_key) {
        $field_name = $input_name_prefix . $meta_key;
        $meta_value[$meta_key] = isset($_POST[$field_name]) ? $_POST[$field_name] : '';
    }

    update_post_meta($post_id, 'tbi-teams-details', $meta_value);
}