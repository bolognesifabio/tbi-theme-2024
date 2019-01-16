<?php
namespace TBI\Metaboxes\Competitions;

$Season_Term = new \TBI\Metaboxes\Models\Taxonomy_Terms_Select([
    'key' => 'seasons',
    'post_types' => ['leagues', 'cups'],
    'title' => 'Stagione',
    'empty_taxonomy_message' => 'Non ci sono stagioni disponibili.<br/>Creane una nella sezione apposita.',
    'default_option_text' => 'Seleziona la stagione'
]);

add_action('add_meta_boxes', [$Season_Term, 'add']);
add_action('save_post', [$Season_Term, 'save']);
