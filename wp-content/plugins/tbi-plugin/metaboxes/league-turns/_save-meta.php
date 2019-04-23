<?php
const TURNS_INPUT_PREFIX = 'tbi-competition-turns';

if (in_array(get_post_type($post_id), ['leagues'])) {
    if (isset($_POST[TURNS_INPUT_PREFIX])) {
        $turns = array_map(function($turn) {
            return [
                'name' => $turn['name'] ?: "",
                'fixtures' => $turn['fixtures'] ?: []
            ];
        }, $_POST[TURNS_INPUT_PREFIX]);

        update_post_meta($post_id, 'tbi-competitions-turns', $turns);
    }
}