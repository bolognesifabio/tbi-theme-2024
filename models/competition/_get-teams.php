<?php
// use \TBI\Classes\Competition_Team as Team;

// $teams_meta = get_post_meta($competition_id, 'tbi-competition-teams', true) ?: [];
// $teams = array_map(function($team_meta) {
//     $team = new Team($team_meta['id'], $competition_id);
//     $team->alias = $team_meta['alias'];
//     $team->handicap = $team_meta['handicap'];
//     $team->priority = $team_meta['priority'];
//     $team->is_not_in_rankings = $team_meta['is_not_in_rankings'];
//     return $team;
// }, $teams_meta);

use TBI\Models\Team;

$teams = get_post_meta($competition_id, 'tbi-competition-teams', true) ?: [];