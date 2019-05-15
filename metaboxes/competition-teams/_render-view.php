<?php
use TBI\Models\Team as Team_Model;

$is_competition_cup = get_post_type($post->ID) === 'cups' ? "true" : "false";
$meta_teams = get_post_meta($post->ID, $this->meta_name, true) ?: [];

$all_teams = array_map(function($team) use($meta_teams) {
    $team->is_selected = array_key_exists($team->id, $meta_teams);
    $team->competition_info = $team->is_selected ? $meta_teams[$team->id] : [
        'name' => $team->title,
        'short_name' => $team->short_name,
        'code' => $team->code,
        'penalty' => 0,
        'priority' => 0,
        'is_not_in_standings' => false
    ];
    return $team;
}, Team_Model::get_all_teams()); ?>

<div class="<?= $this->bem_base ?>">
    <tbi-competition-teams-filters></tbi-competition-teams-filters>
    <tbi-competition-teams-list :teams_input='<?= htmlspecialchars(json_encode($all_teams), ENT_QUOTES) ?>'></tbi-competition-teams-list>
    <tbi-competition-teams-info :is_cup=<?= $is_competition_cup ?>></tbi-competition-teams-info>
</div>