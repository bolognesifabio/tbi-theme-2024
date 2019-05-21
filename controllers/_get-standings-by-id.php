<?php
// use \TBI\Classes\League as League;

// $leagues_ids = League::get_competitions_by_terms($data['competition'], $data['season']);

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