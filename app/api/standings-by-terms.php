<?php
namespace TBI\API;
use TBI\Models\API_Route;
use TBI\Controllers\Competition\League;

$route = '/competitions/standings/(?P<competition>\d+)/(?P<season>\d+)';
$callback = League::get_standings_by_terms;

new API_Route($route, $callback);