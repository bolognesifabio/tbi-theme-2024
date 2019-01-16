<?php
namespace TBI\Metaboxes\Teams;

$Club = new \TBI\Metaboxes\Models\Taxonomy_Terms_Select([
    'key' => 'clubs',
    'post_types' => 'teams',
    'title' => 'Societ&agrave;',
    'empty_taxonomy_message' => 'Non ci sono societ&agrave; disponibili.<br/>Creane una nella sezione apposita.',
    'default_option_text' => 'Seleziona una societ&agtave;'
]);

add_action('add_meta_boxes', [$Club, 'add']);
add_action('save_post', [$Club, 'save']);
