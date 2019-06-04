<?php
use \TBI\Classes\League as League;
use \TBI\Classes\Fixture as Fixture;
use \TBI\Classes\Team as Team;

$leagues_ids = League::get_competitions_by_terms($instance['competitions'], $instance['seasons']);

$leagues = array_map(function($league_id) {
    $league = new League($league_id);
    $league_names = array_map(function($competition) {
        return $competition->name;
    }, $league->competitions);

    $rounds = array_map(function($round) {
        $fixtures = array_map(function($fixture_id) {
            $fixture = new Fixture($fixture_id);
            $fixture->teams = array_map(function($team_id) {
                return new Team($team_id);
            }, $fixture->teams);
            return $fixture;
        }, $round['fixtures']);

        return [
            "id" => $round["id"],
            "fixtures" => $fixtures
        ];
    }, League::sort_fixtures_by_round($league->fixtures, $league->id));

    return [
        'id' => $league->id,
        'title' => join(" - ", $league_names),
        'rounds' => $rounds
    ];
}, $leagues_ids);