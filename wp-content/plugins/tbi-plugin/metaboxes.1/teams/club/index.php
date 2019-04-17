<?php
namespace TBI\Metaboxes\Teams;

$Club = new \TBI\Metaboxes\Models\Taxonomy_Terms_Select([
    'key' => 'clubs',
    'post_types' => 'teams',
    'title' => 'Società',
    'empty_taxonomy_message' => 'Non ci sono società disponibili.<br/>Creane una nella sezione apposita.',
    'default_option_text' => 'Seleziona una società'
]);

add_action('add_meta_boxes', [$Club, 'add']);
add_action('save_post', [$Club, 'save']);
