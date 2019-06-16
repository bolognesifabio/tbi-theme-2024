<?php
use \TBI\Classes\Competition as Competition;
use \TBI\Classes\League as League;
use \TBI\Classes\Fixture as Fixture;
use \TBI\Models\Team as Team;

$season_slug = isset($_GET['season']) ? $_GET['season'] : null;

$last_season_term = get_terms([
    'taxonomy' => 'seasons',
    'orderby' => 'name',
    'order' => 'DESC'
])[0];

$competition_term = get_term_by('slug', 'competition-' . $post->ID, 'competitions');
$season_term = $season_slug ? get_term_by('slug', $season_slug, 'seasons') : $last_season_term;
$competitions_ids = Competition::get_competitions_by_terms($competition_term->term_id, $season_term->term_id);

$competitions = array_map(function($competition_id) {
    if (get_post_type($competition_id) === 'leagues') {
        $competition = new League($competition_id);
        $competition->teams = League::get_standings($competition->teams);
        $rounds = League::sort_fixtures_by_round($competition->fixtures, $competition_id);
    } else {
        $competition = new Competition($competition_id);
        $rounds = array_map(function($round) {
            $cups_rounds = [
                "Altre partite",
                "Finale",
                "Finale 3&deg; posto",
                "Finale 5&deg; posto",
                "Finale 7&deg; posto",
                "Finale 9&deg; posto",
                "Finale 11&deg; posto",
                "Finale 13&deg; posto",
                "Semifinali",
                "Semifinali 1&deg; posto",
                "Semifinali 5&deg; posto",
                "Semifinali 9&deg; posto",
                "Quarti di finale",
                "Ottavi di finale"
            ];
            $round['id'] = $cups_rounds[$round['id']] ?: $cups_rounds[0];
            return $round;
        }, Competition::sort_fixtures_by_round($competition->fixtures, $competition_id));
    }

    $competition->rounds = array_map(function($round) {
        $round['fixtures'] = array_map(function($fixture_id) {
            $fixture = new Fixture($fixture_id);
            $fixture->teams = array_map(function($team_id) {
                return new Team($team_id);
            }, $fixture->teams);
            return $fixture;
        }, $round['fixtures']);
        return $round;
    }, $rounds);

    return $competition;
}, $competitions_ids); ?>

<div class="page-competition row--boxed">
    <h1 class="page-competition__title"><?= $competition_term->name ?: "" ?></h1> <?php
    if ($competition_term->description) { ?>
        <h2 class="page-competition__subtitle"><?= $competition_term->description ?></h2> <?php
    } ?>

    <tbi-vue-page-competition data-slides='<?= json_encode($competitions) ?>'></tbi-vue-page-competition>
</div>