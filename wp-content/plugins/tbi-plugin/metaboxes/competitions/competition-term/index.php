<?php
namespace TBI\Metaboxes\Competitions;

$Competition_Term = new \TBI\Metaboxes\Models\Taxonomy_Terms_Select([
    'key' => 'competitions',
    'post_types' => ['leagues', 'cups'],
    'title' => 'Competizione',
    'empty_taxonomy_message' => 'Non ci sono competizioni disponibili.<br/>Creane una nella sezione apposita.',
    'default_option_text' => 'Seleziona la competizione'
]);

add_action('add_meta_boxes', [$Competition_Term, 'add']);
add_action('save_post', [$Competition_Term, 'save']);
