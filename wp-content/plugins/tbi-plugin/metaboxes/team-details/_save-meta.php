<?php
const FIELDS_NAMES = ['short-name', 'code'];
$is_post_type_teams = get_post_type($post_id) === 'teams';

if ($is_post_type_teams) {
    $meta_value = [];
    
    foreach (FIELDS_NAMES as $field_name) {
        $input_name = 'tbi-team-' . $field_name;
        $meta_value[$field_name] = isset($_POST[$input_name]) ? $_POST[$input_name] : '';
    }

    $meta_value['is-inactive'] = isset($_POST['tbi-team-is-inactive']);

    update_post_meta($post_id, 'tbi-teams-details', $meta_value);
}
