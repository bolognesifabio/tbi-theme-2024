<?php
foreach($league->turns as $turn) {
    foreach($turn['fixtures'] as $fixture) {
        $fixture_home_team = $fixture['teams']['home'];
        $fixture_away_team = $fixture['teams']['away'];
        $fixture_home_team['result'] = $fixture_away_team['result'] = null;

        if ($fixture_home_team['score'] !== 0 && $fixture_away_team['score'] !== 0) {
            if ($fixture_home_team['score'] === $fixture_away_team['score']) $fixture_home_team['result'] = $fixture_away_team['result'] = 'draw';
            else {
                $has_home_won = $fixture_home_team['score'] > $fixture_away_team['score']
                $fixture_home_team['result'] = $has_home_won ? 'won' : 'loss'
                $fixture_away_team['result'] = $has_home_won ? 'loss' : 'won'
            }

            foreach([$fixture_home_team, $fixture_away_team] as $fixture_team) {
                $league_team = $league->teams[$fixture_team['id']]
                if ($league_team && !$league_team->is_not_in_standings) {
                    $league_team 
                }
            }
        }

        // if ($fixture_home_team['score'] !== 0 && $fixture_away_team['score'] !== 0) {
        //     foreach([$fixture_home_team, $fixture_away_team] as $team) {
        //         $league_team = $league->teams[$team['id']];

        //         if ($league_team && !$league_team->is_hidden) {
        //             if ($team)
        //         }
        //     }
        // }
    }
}

// foreach ($league->teams as $team) {
//     if (!$team->is_hidden) {
//         foreach($league->turns as $turn) {
//             foreach($turn['fixtures'] as $fixture) {
//                 $is_fixture_played = $fixture['teams']['home']['score'] !== 0 && $fixture['teams']['away']['score'] !== 0;
//             }
//         }
//     }
// }

var_dump($league);