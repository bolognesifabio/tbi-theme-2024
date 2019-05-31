<?php
// use TBI\Models\Competition;
// namespace TBI\Controllers;

// use TBI\Controllers\Competition;

// require_once(get_template_directory() . '/controllers/competition/index.php');

// // $leagues = Competition::get_by_terms($data['competition'], $data['season']);

// Competition\League::get_standings_by_terms(11, 12);

use TBI\Models\Competition\League;

$league = new League(28);

$league_fixtures = [];

foreach($league->turns as $turn) {
    $league_fixtures = array_merge($league_fixtures, $turn['fixtures']);
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