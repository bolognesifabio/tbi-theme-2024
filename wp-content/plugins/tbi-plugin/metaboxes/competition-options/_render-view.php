<?php
use TBI\Helpers\Metaboxes as Metaboxes_Helper;

$is_post_type_leagues = get_post_type($post_id) === 'leagues';

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

$competition_options_meta = get_post_meta($post->ID, 'tbi-competition-options', true) ?: [];

if ($is_post_type_leagues) {
    $league_options_fields = [
        'victory-points' => [
            'default' => 2,
            'label' => 'Punti vittoria'
        ],
        'draw-points' => [
            'default' => 1,
            'label' => 'Punti pareggio'
        ],
        'loss-points' => [
            'default' => 0,
            'label' => 'Punti sconfitta'
        ]
    ];
}
?>

<div class="tbi-metaboxes-form tbi-metaboxes-form--side">
    <div class="tbi-metaboxes-form__field tbi-metaboxes-form__field--wrap">
        <label class="tbi-metaboxes-form__field__label">Competizione</label> <?php
        Metaboxes_Helper::render_taxonomy_select($competitions_taxonomy_options); ?>
    </div>

    <div class="tbi-metaboxes-form__field tbi-metaboxes-form__field--wrap">
        <label class="tbi-metaboxes-form__field__label">Stagione</label> <?php
        Metaboxes_Helper::render_taxonomy_select($seasons_taxonomy_options); ?>        
    </div> <?php

    if ($is_post_type_leagues) {
        foreach ($league_options_fields as $field_key => $field_value) { ?>
            <div class="tbi-metaboxes-form__field">
                <label class="tbi-metaboxes-form__field__label"><?= $field_value['label'] ?></label>
                <input
                    class="tbi-metaboxes-form__field__value tbi-metaboxes-form__field__value--short"
                    type="number"
                    name="tbi-competition-<?= $field_key ?>"
                    value="<?= $competition_options_meta[$field_key] !== null ? $competition_options_meta[$field_key] : $field_value['default'] ?>"
                />        
            </div> <?php
        }
    } ?>

    <div class="tbi-metaboxes-form__field">
        <label class="tbi-metaboxes-form__field__label">Priorit&agrave nella competizione</label>
        <input
            class="tbi-metaboxes-form__field__value tbi-metaboxes-form__field__value--short"
            type="number"
            name="tbi-competition-priority"
            value="<?= $competition_options_meta['priority'] ?: 0 ?>"
        />        
    </div>
</div>