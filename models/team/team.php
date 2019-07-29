<?php
namespace TBI\Models;

class Team {
    public $id;
    public $title;
    public $bio;
    public $url;
    public $club;
    public $emblem;
    public $short_name;
    public $code;
    public $is_inactive;
    public $is_hidden;

    public function __construct($id) {
        $team_post = get_post($id);
        $teams_details = get_post_meta($team_post->ID, 'tbi-team-details', true) ?: [];

        $this->id = $team_post->ID;
        $this->title = $team_post->post_title;
        $this->bio = $team_post->post_content;
        $this->url = get_permalink($this->id);
        $this->club = get_the_terms($this->id, 'clubs_taxonomy')[0] ?: null;
        $this->short_name = $teams_details['short_name'] ?: '';
        $this->code = $teams_details['code'] ?: '';
        $this->is_inactive = $teams_details['is_inactive'] ? true : false;
        $this->is_hidden = $teams_details['is_hidden'] ? true : false;
        
        $this->load_emblem_url();
    }
    
    private function load_emblem_url() {
        $this->emblem = "";

        $team_post_emblem = get_the_post_thumbnail_url($this->id);
        if ($team_post_emblem) $this->emblem = $team_post_emblem;
        else {
            $club_post_id = intval(str_replace('club-', '', $this->club->slug));
            $club_post_emblem = get_the_post_thumbnail_url($club_post_id);
            $this->emblem = $club_post_emblem ?: get_template_directory_uri() . '/assets/img/svg/team-logo.svg';
        }

    }
}