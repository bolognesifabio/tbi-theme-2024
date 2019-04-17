<?php
use TBI\Helpers\Metaboxes as Metaboxes_Helper;

$competitions_taxonomy_options = [
    'key' => 'competitions',
    'empty_taxonomy_message' => 'Non ci sono competizioni disponibili.<br/>Creane una nella sezione apposita.',
    'default_option_text' => 'Seleziona la competizione'
];

$seasons_taxonomy_options = [
    'key' => 'seasons',
    'empty_taxonomy_message' => 'Non ci sono stagioni disponibili.<br/>Creane una nella sezione apposita.',
    'default_option_text' => 'Seleziona la stagione'
];
?>

<h4>Competizione</h4> <?php
Metaboxes_Helper::render_taxonomy_select($competitions_taxonomy_options); ?>

<h4>Stagione</h4> <?php
Metaboxes_Helper::render_taxonomy_select($seasons_taxonomy_options); ?>

<h4>Punti vittoria</h4>
<input type="number" />

<h4>Punti pareggio</h4>
<input type="number" />

<h4>Punti sconfitta</h4>
<input type="number" />