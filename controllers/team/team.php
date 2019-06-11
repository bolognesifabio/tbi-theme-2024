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
}