<?php
namespace TBI\Models;
use TBI\Helpers\Files;
use TBI\Models\Competition\Team;

Files::require_absolute_path('models/competition/team.php');

class Competition {
    public $id;
    public $title;
    public $type;
    public $competition;
    public $season;
    public $date;
    public $are_fixtures_dates_visible;
    public $priority;
    public $teams;
    public $turns;

    public function __construct($id) {
        $post = get_post($id);
        $teams_meta = get_post_meta($id, 'tbi-competition-teams', true) ?: [];
        $turns_meta = get_post_meta($id, 'tbi-competition-turns', true) ?: [];
        $options_meta = get_post_meta($id, 'tbi-competition-options', true) ?: [];

        $this->id = $id;
        $this->title = $post->post_title;
        $this->excerpt = $post->post_excerpt;
        $this->content = $post->post_content;
        $this->type = $post->post_type; 
        $this->competition = wp_get_post_terms($id, 'competitions')[0];
        $this->season = wp_get_post_terms($id, 'seasons')[0];
        $this->date = $options_meta['date'];
        $this->are_fixtures_dates_visible = $options_meta['are_fixtures_dates_visible'] ?: false;
        $this->priority = $options_meta['priority'] ?: 0;
        
        $this->teams = array_map(function($team, $team_id) {
            return new Team($team_id, $team);
        }, $teams_meta, array_keys($teams_meta));
        
        $this->turns = array_map(function($turn) {
            $turn['fixtures'] = array_map(function($fixture) {
                $fixture['teams']['home']['info'] = array_values(array_filter($this->teams, function($team) use($fixture) {
                    return $team->id == $fixture['teams']['home']['id'];
                }))[0];

                $fixture['teams']['away']['info'] = array_values(array_filter($this->teams, function($team) use($fixture) {
                    return $team->id == $fixture['teams']['away']['id'];
                }))[0];
                
                return $fixture;
            }, $turn['fixtures']);

            return $turn;
        }, $turns_meta);
    }
}