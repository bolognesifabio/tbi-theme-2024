<?php
use TBI\Models\Competition\Team;

require_once(get_template_directory() . '/models/competition/team/index.php');

$teams = array_map(function($team_id) {
    return new Team($team_id);
}, get_post_meta($competition_id, 'tbi-competition-teams', true) ?: []);