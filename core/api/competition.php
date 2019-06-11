<?php
namespace TBI\Core\API;
use TBI\Models\Core\API_Route;
use TBI\Controllers\Competition\League as League_Controller;

class Competition {
    public function get_standings_by_terms($data) {
        return League_Controller::get_standings_by_terms($data['competition'], $data['season']);
    }
}

new API_Route('/competition/(?P<competition>\d+)/season/(?P<season>\d+)/standings', [new Competition, 'get_standings_by_terms']);