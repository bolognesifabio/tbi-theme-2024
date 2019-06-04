<?php
namespace TBI\Controllers\Competition;
use TBI\Controllers\Competition as Competition_Controller;

abstract class League extends Competition_Controller {
    public function get_standings($league) { require '_get-standings.php'; return $league; }
    public function get_standings_by_id($league_id) { require '_get-standings-by-id.php'; return $league; }
    public function get_standings_by_terms($competitions_terms, $seasons_terms) { require '_get-standings-by-terms.php'; return $leagues; }
}