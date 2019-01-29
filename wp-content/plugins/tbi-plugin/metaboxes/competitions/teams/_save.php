<?php
const PARTICIPANTS_INPUT_NAME = 'tbi-metaboxes-competitions-teams-participants';
const INFO_INPUT_NAME = 'tbi-metaboxes-competitions-teams-info';

if (in_array(get_post_type($post_id), ['leagues', 'cups']) && isset($_POST[PARTICIPANTS_INPUT_NAME])) {
    $participants = [];

    foreach ($_POST[PARTICIPANTS_INPUT_NAME] as $participant_id) {
        $participants[$participant_id] = [
            "name" => $_POST[INFO_INPUT_NAME . '-name'][$participant_id],
            "short_name" => $_POST[INFO_INPUT_NAME . '-short-name'][$participant_id],
            "team_code" => $_POST[INFO_INPUT_NAME . '-team-code'][$participant_id],
            "penalty" => $_POST[INFO_INPUT_NAME . '-penalty'][$participant_id],
            "priority" => $_POST[INFO_INPUT_NAME . '-priority'][$participant_id]
        ];
    }

    update_post_meta($post_id, 'tbi-competitions-teams', $participants);
}