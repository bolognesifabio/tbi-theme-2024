<?php
namespace TBI\Controllers\Competition;
use TBI\Helpers\Files;
use TBI\Controllers\Competition as Competition_Controller;

Files::require_absolute_path('controllers/competition/competition.php');

abstract class League extends Competition_Controller {
    public function get_standings($league) {
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