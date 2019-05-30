<?php
namespace TBI\Controllers\Competition;
use TBI\Controllers\Competition as Competition_Controller;

abstract class League extends Competition_Controller {
    public function get_standings($league) { require '_get-standings.php'; return $standings; }
    public function get_standings_by_terms($competitions_terms, $seasons_terms) { require '_get-standings-by-terms.php'; return $standings; }
}