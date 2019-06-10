<div class="tbi-metaboxes-form"> <?php
    foreach ($fields as $field_key => $field) {
        $class_short_modifier = $field['is_short'] ? 'tbi-metaboxes-form__field__value--short' : '';
        $input_name = $context . '[' . $field_key . ']';
        $input_maxlength = $field['maxlength'] ? 'maxlength="' . $field['maxlength'] . '"' : ''; ?>

        <div class="tbi-metaboxes-form__field">
            <label class="tbi-metaboxes-form__field__label"><?= $field['label'] ?></label> <?php

            if ($field['type'] === 'checkbox') { ?>
                <input
                    class="tbi-metaboxes-form__field__value"
                    type="checkbox"
                    name="<?= $input_name ?>"
                    value="true"
                    <?= $meta_values[$field_key] ? 'checked' : '' ?>
                /> <?php
            } else { ?>
                <input
                    class="tbi-metaboxes-form__field__value <?= $class_short_modifier ?>"
                    type="<?= $field['type'] ?: 'text' ?>"
                    name="<?= $input_name ?>"
                    value="<?= $meta_values[$field_key] ?>"
                    <?= $input_maxlength ?>
                /> <?php
            } ?>
        </div> <?php                
    } ?>
</div> <?php