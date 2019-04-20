<?php
use TBI\Helpers\Metaboxes as Metaboxes_Helper;

$team_taxonomy_options = [
    'key' => 'clubs',
    'empty_taxonomy_message' => 'Non ci sono societ&agrave; disponibili.<br/>Creane una nella sezione apposita.',
    'default_option_text' => 'Seleziona la societ&agrave;'
];

Metaboxes_Helper::render_taxonomy_select($team_taxonomy_options); ?>