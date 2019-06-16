<?php
namespace TBI\Controllers;
use TBI\Models\Team as Team_Model;

abstract class Team {
    public function get_all() {
        $teams_posts = get_posts([
            'numberposts' => -1,
            'post_type' => 'teams',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC',
            'fields' => 'ids'
        ]) ?: [];

        return array_map(function($team) {
            return new Team_Model($team);
        }, $teams_posts);
    }

    public function get_metaboxes_competition_teams($post_id, $meta_name) {
        $meta_teams = get_post_meta($post_id, $meta_name, true) ?: [];

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
        }, self::get_all());

        return htmlspecialchars(json_encode($all_teams), ENT_QUOTES);
    }
}