<?php
namespace TBI\Metaboxes\Teams;

class Club extends \TBI\Metaboxes\Models\Taxonomy_Terms_Select {}

Club::init([
    'key' => 'clubs',
    'post_type' => 'teams',
    'title' => 'Societ&agrave;',
    'empty_taxonomy_message' => 'Non ci sono societ&agrave; disponibili.<br/>Creane una nella sezione apposita.'
]);

add_action('add_meta_boxes', ['TBI\Metaboxes\Teams\Club', 'add']);
add_action('save_post', ['TBI\Metaboxes\Teams\Club', 'save']);