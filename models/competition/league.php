<?php
namespace TBI\Models\Competition;
use TBI\Helpers\Files;
use TBI\Models\Competition as Competition_Model;

Files::require_absolute_path('models/competition/competition.php');

class League extends Competition_Model {
    public $victory_points;    
    public $draw_points;
    public $loss_points;

    public function __construct($id) {
        parent::__construct($id);

        $this->victory_points = $options_meta['victory_points'] ?: 2;
        $this->draw_points = $options_meta['draw_points'] ?: 1;
        $this->loss_points = $options_meta['loss_points'] ?: 0;

        $this->set_teams_points();
    }

    private function set_teams_points() {
        $all_fixtures = $this->get_all_fixtures();
        $teams_results = [];

        foreach ($all_fixtures as $fixture) {
            $home_team = $fixture['teams']['home'];
            $away_team = $fixture['teams']['away'];
            $is_played = $home_team['score'] !== 0 || $away_team['score'] !== 0;

            if ($is_played) {
                $is_draw = $home_team['score'] === $away_team['score'];
                $is_home_winner = $home_team['score'] > $away_team['score'];

                foreach ($fixture['teams'] as $status => $team) {
                    if (!isset($teams_result[$team['id']])) {
                        $teams_result[$team['id']] = [
                            "played" => 0,
                            "won" => 0,
                            "loss" => 0,
                            "draw" => 0
                        ];
                    }

                    $current_team_results = $teams_result[$team['id']];
                    $is_home_team = $status === 'home';

                    if ($is_draw) $current_team_results['draw']++;
                    if (($is_home_winner && $is_home_team) || (!$is_home_winner && !$is_home_team)) $current_team_results['won']++;
                    else $current_team_results['loss']++;

                    $current_team_results['played']++;
                }
            }

            foreach ($this->teams as $team) {
                $league_team_results = isset($teams_results[$team->id]) ? $teams_results[$team->id] : null;

                if (!$team->is_not_in_standings && $league_team_results) {
                    foreach ($league_team_results as $result_type => $result_value) {
                        $team->$result_type = $result_value;
                    }
                }
            }
        }
    }

    private function get_all_fixtures() {
        return array_reduce($this->turns, function($fixtures, $turn) {
            if ($turn['fixtures']) return array_merge($fixtures, $turn['fixtures']);
        }, []);
    }
}