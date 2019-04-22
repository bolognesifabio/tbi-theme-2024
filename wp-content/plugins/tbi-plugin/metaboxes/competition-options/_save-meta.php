<?php
const TERMS_NAMES = ['competitions', 'seasons'];
const COMPETITION_OPTIONS_FIELDS = ['victory-points', 'draw-points', 'loss-points', 'priority'];

if (in_array(get_post_type($post_id), ['leagues', 'cups'])) {
    $competition_options = [];

    foreach (TERMS_NAMES as $term) {
        $select_name = 'tbi-metaboxes-' . $term;
        if (isset($_POST[$select_name])) wp_set_post_terms($post_id, $_POST[$select_name], $term);
    }

    foreach (COMPETITION_OPTIONS_FIELDS as $key) {
        $competition_options[$key] = isset($_POST['tbi-competition-' . $key]) ? $_POST['tbi-competition-' . $key] : null;
    }

    update_post_meta($post_id, 'tbi-competition-options', $competition_options);
}
