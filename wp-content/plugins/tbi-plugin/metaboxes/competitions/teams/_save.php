<?php
const PARTICIPANTS_INPUT_NAME = 'tbi-metaboxes-competitions-teams-participants';

if (in_array(get_post_type($post_id), ['leagues', 'cups'])) {
    $participants = isset($_POST[PARTICIPANTS_INPUT_NAME]) ? $_POST[PARTICIPANTS_INPUT_NAME] : [];
    update_post_meta($post_id, 'tbi-competitions-teams', $participants);
}