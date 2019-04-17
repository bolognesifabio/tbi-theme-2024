<?php
$terms_names = ['competitions', 'seasons'];

foreach ($terms_names as $term) {
    $select_name = 'tbi-metaboxes-' . $term;
    if (isset($_POST[$select_name])) wp_set_post_terms($post_id, $_POST[$select_name], $term);
}