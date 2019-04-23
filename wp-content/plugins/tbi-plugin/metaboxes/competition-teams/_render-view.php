<?php
use TBI\Models\Team as Team_Model;

$meta_teams = get_post_meta($post->ID, 'tbi-competitions-teams', true) ?: [];
$all_teams = array_map(function($team) use($meta_teams) {
    $team->is_selected = array_key_exists($team->id, $meta_teams);
    $team->competition_info = $team->is_selected ? $meta_teams[$team->id] : [
        'name' => $team->title,
        'short_name' => $team->short_name,
        'code' => $team->code,
        'penalty' => 0,
        'priority' => 0
    ];
    return $team;
}, Team_Model::get_all_teams()); ?>

<div class="tbi-metaboxes-competition-teams">
    <tbi-competition-teams-filters></tbi-competition-teams-filters>
    <tbi-competition-teams-list :teams_input='<?= htmlspecialchars(json_encode($all_teams), ENT_QUOTES) ?>'></tbi-competition-teams-list>
    <tbi-competition-teams-info></tbi-competition-teams-info>
</div>