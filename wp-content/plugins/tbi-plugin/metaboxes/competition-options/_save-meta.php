<?php
$terms_names = ['competitions', 'seasons'];

foreach ($terms_names as $term) {
    $select_name = 'tbi-metaboxes-' . $term;
    if (isset($_POST[$select_name])) wp_set_post_terms($post_id, $_POST[$select_name], $term);
}

if (in_array(get_post_type($post_id), ['leagues', 'cups'])) {
    $competition_options_fields = ['victory-points', 'draw-points', 'loss-points', 'priority'];
    $competition_options = [];

    foreach ($competition_options_fields as $key) {
        $competition_options[$key] = isset($_POST['tbi-competition-' . $key]) ? $_POST['tbi-competition-' . $key] : null;
    }    
}

update_post_meta($post_id, 'tbi-competition-options', $competition_options);