<?php
namespace TBI\Core\API;
use TBI\Models\Core\API_Route;
use TBI\Controllers\Competition as Competition_Controller;
use TBI\Controllers\Competition\League as League_Controller;

class Competition {
    public function get_standings_by_terms($data) {
        return League_Controller::get_standings_by_terms($data['competition'], $data['season']);
    }

    public function get_by_terms($data) {
        return Competition_Controller::get_by_terms($data['competition'], $data['season']);
    }
}

new API_Route('/competition/(?P<competition>\d+)/season/(?P<season>\d+)/standings', [new Competition, 'get_standings_by_terms']);
new API_Route('/competition/(?P<competition>\d+)/season/(?P<season>\d+)/fixtures', [new Competition, 'get_by_terms']);