<?php
namespace TBI\Helpers;

abstract class Metaboxes {
    public static function render_form($context, $fields, $meta_values) { ?>
        <div class="tbi-metaboxes-form"> <?php
            foreach ($fields as $field_key => $field) {
                $class_short_modifier = $field['is_short'] ? 'tbi-metaboxes-form__field__value--short' : '';
                $input_name = 'tbi-' . $context . '-' . $field_key;
                $input_maxlength = $field['maxlength'] ? 'maxlength="' . $field['maxlength'] . '"' : ''; ?>

                <div class="tbi-metaboxes-form__field">
                    <label class="tbi-metaboxes-form__field__label"><?= $field['label'] ?></label> <?php

                    if ($field['type'] === 'checkbox') { ?>
                        <input
                            class="tbi-metaboxes-form__field__value"
                            type="checkbox"
                            name="<?= $input_name ?>"
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
    }

    public static function render_taxonomy_select($options) {
        $taxonomy_terms = get_terms([
            'taxonomy' => $options['key'],
            'hide_empty' => false,
            'orderby' => 'name'
        ]) ?: [];

        $post_terms = array_map(function($term) {
            return $term->term_id;
        }, get_the_terms($post->ID, $options['key']) ?: []);

        if (count($taxonomy_terms)) { ?>
            <select class="tbi-metaboxes-term-select" name="tbi-metaboxes-<?= $options['key'] ?>">
                <option>- <?= $options['default_option_text'] ?></option> <?php
                
                foreach ($taxonomy_terms as $term) { ?>
                    <option
                        value="<?= $term->term_id ?>"
                        <?= in_array($term->term_id, $post_terms) ? 'selected' : '' ?>
                    ><?= $term->name ?></option> <?php
                } ?>
            </select> <?php
        } else { ?>
            <p><?= $options['empty_taxonomy_message'] ?></p> <?php
        } 
    }
}