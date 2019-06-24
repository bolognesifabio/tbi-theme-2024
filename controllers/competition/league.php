<?php
namespace TBI\Controllers\Competition;
use TBI\Helpers\Files;
use TBI\Controllers\Competition as Competition_Controller;

Files::require_absolute_path('controllers/competition/competition.php');

abstract class League extends Competition_Controller {
    public function get_standings($league) {
        $league_fixtures = [];

        foreach($league->turns as $turn) {
            if ($turn['fixtures']) $league_fixtures = array_merge($league_fixtures, $turn['fixtures']);
        }

        foreach ($league->teams as $team) {
            if (!$team->is_not_in_standings) {
                $team_fixtures = array_filter($league_fixtures, function($fixture) use($team) {
                    $is_team_in_fixture = in_array($team->id, [$fixture['teams']['home']['id'], $fixture['teams']['away']['id']]);
                    $has_fixture_been_played = $fixture['teams']['home']['score'] !== 0 || $fixture['teams']['away']['score'] !== 0;
                    return $is_team_in_fixture && $has_fixture_been_played;
                });
            
                foreach ($team_fixtures as $fixture) {
                    $is_home_team = $team->id == $fixture['teams']['home']['id'];
                    $is_draw = $fixture['teams']['home']['score'] === $fixture['teams']['away']['score'];
                    $is_home_winner = $fixture['teams']['home']['score'] > $fixture['teams']['away']['score'];
            
                    if ($is_draw) $team->draw++;
                    else if (($is_home_winner && $is_home_team) || (!$is_home_winner && !$is_home_team)) $team->won++;
                    else $team->loss++;
            
                    $team->played++;
                }

                $team->points = ($league->victory_points * $team->won) + ($league->draw_points * $team->draw) + ($league->loss_points * $team->loss);
            }
        }

        usort($league->teams, function($team_a, $team_b) {
            if ($team_a->points === $team_b->points) {
                if ($team_a->priority === $team_b->priority) {
                    return strcmp($team_a->title, $team_b->title);
                }

                return $team_a->priority < $team_b->priority;
            }

            return $team_a->points < $team_b->points;
        });

        return $league;
    }

    public function get_standings_by_id($league_id) {
        return self::get_standings(parent::get_by_id($league_id));
    }

    public function get_standings_by_terms($competitions_terms, $seasons_terms) {
        $leagues = self::get_leagues_by_terms($competitions_terms, $seasons_terms);

        return array_map(function($league) {
            return self::get_standings($league);
        }, $leagues);
    }

    public function get_leagues_by_terms($competitions_terms, $seasons_terms) {
        return parent::get_by_terms($competitions_terms, $seasons_terms, ['leagues']);
    }
}