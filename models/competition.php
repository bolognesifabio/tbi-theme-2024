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
        $options_meta = get_post_meta($id, 'tbi-competition-options', true) ?: [];

        $this->id = $id;
        $this->title = $post->post_title;
        $this->excerpt = $post->post_excerpt;
        $this->content = $post->post_content;
        $this->type = $post->post_type; 
        $this->competition = wp_get_post_terms($id, 'competitions_taxonomy')[0];
        $this->season = wp_get_post_terms($id, 'seasons')[0];
        $this->date = $options_meta['date'];
        $this->are_fixtures_dates_visible = $options_meta['are_fixtures_dates_visible'] ?: false;
        $this->priority = $options_meta['priority'] ?: 0;

        $this->teams = [];

        foreach($teams_meta as $team_id => $team) {
            $this->teams[$team_id] = new Team($team_id, $team);
        }
        
        $this->turns = get_post_meta($id, 'tbi-competition-turns', true) ?: [];
    }

    public function set_turns_info() {
        $current_turn_index = 0;
        $today_date = strtotime(date('Y-m-d'));        

        foreach ($this->turns as $index => $turn) {
            $output_fixtures = [];
            $current_turn_date = strtotime($this->turns[$current_turn_index]["show_date"]);
            $turn_date = strtotime($turn["show_date"]);
            
            if ($today_date >= $turn_date && $turn_date > $current_turn_date) $current_turn_index = $index;

            foreach ($turn["fixtures"] as $fixture) {
                $fixture_date = $fixture["date"] ? strval($fixture["date"]) : "0";
                $output_fixtures[$fixture_date][] = $fixture;
            }

            $this->turns[$index]["fixtures"] = $output_fixtures;
        }

        $this->turns[$current_turn_index]["is_current"] = true;
    }
}