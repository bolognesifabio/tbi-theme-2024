<?php
const INPUT_NAME_PREFIX = 'tbi-metaboxes-teams-details-';
const META_KEYS = ['short-name', 'team-code', 'is-inactive'];

if (get_post_type($post_id) === 'teams') {
    $meta_value = [];

    foreach (META_KEYS as $meta_key) {
        $field_name = INPUT_NAME_PREFIX . $meta_key;
        $meta_value[$meta_key] = isset($_POST[$field_name]) ? $_POST[$field_name] : '';
    }

    update_post_meta($post_id, 'tbi-teams-details', $meta_value);
}