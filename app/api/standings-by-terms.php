<?php
namespace TBI\API;
use TBI\Models\API_Route;
use TBI\Controllers\Competition\League;

class League_API_Controller {
    public function get_standings_by_terms($data) {
        return League::get_standings_by_terms($data['competition'], $data['season']);
    }
}

new API_Route('/competitions/standings/(?P<competition>\d+)/(?P<season>\d+)', [new League_API_Controller, 'get_standings_by_terms']);