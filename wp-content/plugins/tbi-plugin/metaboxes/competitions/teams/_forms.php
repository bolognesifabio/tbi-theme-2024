<?php
namespace TBI;

$meta_teams = get_post_meta($post->ID, 'tbi-competitions-teams', true) ?: [];
$all_teams = array_map(function($team) use($meta_teams) {
    $team->is_selected = in_array($team->id, $meta_teams);
    return $team;
}, Models\Team::get_all_teams()); ?>

<div class="competitions-metaboxes__teams"> <?php
    include '_filters.php'; ?>
    <hr/> <?php
    include '_teams-list.php'; ?>
</div>