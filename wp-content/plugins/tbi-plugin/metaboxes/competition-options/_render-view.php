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

<div class="tbi-metaboxes-form tbi-metaboxes-form--side">
    <div class="tbi-metaboxes-form__field tbi-metaboxes-form__field--wrap">
        <label class="tbi-metaboxes-form__field__label">Competizione</label> <?php
        Metaboxes_Helper::render_taxonomy_select($competitions_taxonomy_options); ?>
    </div>

    <div class="tbi-metaboxes-form__field tbi-metaboxes-form__field--wrap">
        <label class="tbi-metaboxes-form__field__label">Stagione</label> <?php
        Metaboxes_Helper::render_taxonomy_select($seasons_taxonomy_options); ?>        
    </div>

    <div class="tbi-metaboxes-form__field">
        <label class="tbi-metaboxes-form__field__label">Punti vittoria</label>
        <input class="tbi-metaboxes-form__field__value tbi-metaboxes-form__field__value--short" type="number" name="tbi-league-victory-points" value="2" />        
    </div>

    <div class="tbi-metaboxes-form__field">
        <label class="tbi-metaboxes-form__field__label">Punti pareggio</label>
        <input class="tbi-metaboxes-form__field__value tbi-metaboxes-form__field__value--short" type="number" name="tbi-league-draw-points" value="1" />        
    </div>

    <div class="tbi-metaboxes-form__field">
        <label class="tbi-metaboxes-form__field__label">Punti sconfitta</label>
        <input class="tbi-metaboxes-form__field__value tbi-metaboxes-form__field__value--short" type="number" name="tbi-league-loss-points" value="0" />        
    </div>
</div>