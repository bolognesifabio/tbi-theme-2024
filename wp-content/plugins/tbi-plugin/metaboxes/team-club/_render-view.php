<?php
use TBI\Helpers\Metaboxes as Metaboxes_Helper;

$team_taxonomy_options = [
    'key' => 'clubs',
    'empty_taxonomy_message' => 'Non ci sono societ&agrave; disponibili.<br/>Creane una nella sezione apposita.',
    'default_option_text' => 'Seleziona la societ&agrave;'
]; ?>

<div class="tbi-metaboxes-form tbi-metaboxes-form--side">
    <div class="tbi-metaboxes-form__field tbi-metaboxes-form__field--wrap"> <?php
        Metaboxes_Helper::render_taxonomy_select($team_taxonomy_options); ?>
    </div>
</div>