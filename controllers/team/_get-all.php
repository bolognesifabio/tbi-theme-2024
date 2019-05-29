<?php
use TBI\Models\Team;

$teams_posts = get_posts([
    'numberposts' => -1,
    'post_type' => 'teams',
    'post_status' => 'publish',
    'orderby' => 'title',
    'order' => 'ASC',
    'fields' => 'ids'
]) ?: [];

$teams = array_map(function($team) {
    return new Team($team);
}, $teams_posts);