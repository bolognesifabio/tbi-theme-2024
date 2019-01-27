<?php
namespace TBI;

$meta_teams = get_post_meta($post->ID, 'tbi-competitions-teams', true) ?: [];
$all_teams = array_map(function($team) use($meta_teams) {
    $team->is_selected = array_key_exists($team->id, $meta_teams);
    $team->competition_info = $team->is_selected ? $meta_teams[$team->id] : [
        'name' => '',
        'short_name' => '',
        'team_code' => ''
    ];
    return $team;
}, Models\Team::get_all_teams()); ?>

<div class="competitions-metaboxes__teams"> <?php
    include '_filters.php';
    include '_teams-list.php';
    include '_teams-info.php'; ?>
</div>