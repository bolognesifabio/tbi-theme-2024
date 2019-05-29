<?php
// use TBI\Models\Competition;
namespace TBI\Controllers;

require_once(get_template_directory() . '/controllers/competition/index.php');

$leagues = Competition::get_by_terms($data['competition'], $data['season']);

// $leagues = array_map(function($league_id) {
//     $league = new League($league_id);
//     $league_names = array_map(function($competition) {
//         return $competition->name;
//     }, $league->competitions);

//     return [
//         'id' => $league->id,
//         'title' => join(" - ", $league_names),
//         'teams' => League::get_standings($league->teams)
//     ];
// }, $leagues_ids);

// $leagues = array_map(function($league_id) {
//     $teams = Competition::get_teams($league_id);
//     $turns = Competition::get_turns($league_id);

//     // var_dump($teams);
//     // var_dump($turns);

//     $standings = array_map(function ($team) use ($turns) {
//         $team['points'] = 0;
//         $team['played'] = 0;
//         $team['won'] = 0;
//         $team['loss'] = 0;
//         $team['draw'] = 0;

//         foreach($turns as $turn) {
//             foreach($turn['fixtures'] as $fixture) {
//                 if (($fixture['home']['id'] === $team['id'] || $fixture['away']['id'] === $team['id']) && $fixture['home']['score'] !== 0 && $fixture['away']['score'] !== 0 ) {
//                     $team['played']++;

//                     var_dump($fixture);
//                 }
//             }
//         }

//         return $team;
//     }, $teams);

//     return $standings;

// }, $leagues_ids);

// $leagues = $leagues_ids;