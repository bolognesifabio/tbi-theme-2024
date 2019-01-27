<?php
namespace TBI\Models;

class Team {
    public function __construct($team_input) {
        if (gettype($team_input) === 'object') $team_post = $team_input;
        else $team_post = get_post($team_input);

        $teams_details = get_post_meta($team_post->ID, 'tbi-teams-details', true) ?: [];

        $this->id = $team_post->ID;
        $this->title = $team_post->post_title;
        $this->bio = $team_post->post_content;
        $this->url = get_permalink($this->id);
        $this->club = get_the_terms($this->id, 'clubs')[0] ?: null;
        $this->emblem = $this->get_team_emblem_url();
        $this->short_name = $teams_details['short-name'] ?: '';
        $this->team_code = $teams_details['team-code'] ?: '';
        $this->is_inactive = $teams_details['is-inactive'] ? true : false;
    }

    public static function get_all_teams() {
        $teams_posts = get_posts([
            'numberposts' => -1,
            'post_type' => 'teams',
            'post_status' => 'publish',
            'orderby' => 'title',
            'order' => 'ASC'
        ]) ?: [];

        return array_map(function($team) {
            return new Team($team);
        }, $teams_posts);
    }

    private function get_team_emblem_url() {
        $team_post_emblem = get_the_post_thumbnail_url($this->id);
        if ($team_post_emblem) return $team_post_emblem;
        
        $club_post_id = intval(str_replace('club-', '', $this->club->slug));
        $club_post_emblem = get_the_post_thumbnail_url($club_post_id);
        return $club_post_emblem ?: plugins_url('tbi-plugin/img/team-logo.svg');
    }
}