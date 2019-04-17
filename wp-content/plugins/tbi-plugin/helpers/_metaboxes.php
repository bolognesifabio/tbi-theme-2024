<?php
namespace TBI\Helpers\Metaboxes;

function render_form($context, $fields, $meta_values) { ?>
    <form class="tbi-metaboxes-form"> <?php
        foreach ($fields as $field_key => $field) {
            $class_short_modifier = $field['is_short'] ? 'tbi-metaboxes-form__field__value--short' : '';
            $input_name = 'tbi-' . $context . '-' . $field_key;
            $input_maxlength = $field['maxlength'] ? 'maxlength="' . $field['maxlength'] . '"' : ''; ?>

            <div class="tbi-metaboxes-form__field">
                <label class="tbi-metaboxes-form__field__label"><?= $field['label'] ?></label>
                <input
                    class="tbi-metaboxes-form__field__value <?= $class_short_modifier ?>"
                    type="<?= $field['type'] ?: 'text' ?>"
                    name="<?= $input_name ?>"
                    value="<?= $meta_values[$field_key] ?>"
                    <?= $input_maxlength ?>
                />
            </div> <?php                
        } ?>
    </form> <?php
}