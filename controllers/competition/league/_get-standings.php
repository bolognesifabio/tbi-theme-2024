<?php
foreach ($league->turns as $turn) {
    foreach($turn['fixtures'] as $fixture) {
        $fixture_home_team = $fixture['teams']['home'];
        $fixture_away_team = $fixture['teams']['away'];

        if ($home_team['score'] !== 0 && $away_team['score'] !== 0) {
            $league->teams[$home_team['id']]->played++;
            $league->teams[$away_team['id']]->played++;

            if ($home_team['score'] === $away_team['score']) {
                $league->teams[$home_team['id']]->draw++;
                $league->teams[$away_team['id']]->draw++;
            }
        }
    }
}

var_dump($league);