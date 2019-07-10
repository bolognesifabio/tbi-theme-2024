<?php
use TBI\Controllers\Competition as Competition_Controller;
use TBI\Controllers\Competition\League as League_Controller;

if (isset($_GET['season'])) $season_term = get_term_by('slug', $_GET['season'], 'seasons');
else {
    $season_term = get_terms([
        'taxonomy' => 'seasons',
        'orderby' => 'name',
        'order' => 'DESC',
        'number' => 1
    ])[0];
}

$competition_term = get_term_by('slug', 'competition-' . $post->ID, 'competitions');
$competitions = array_map(function($competition) {
    $competition->turns = array_map(function($turn) {
        $turn["id"] = $turn["name"];
        return $turn;
    }, $competition->turns);

    if ($competition->type === 'leagues') return League_Controller::get_standings($competition);
    return $competition;
}, Competition_Controller::get_by_terms($competition_term->term_id, $season_term->term_id));
?>

<div class="page-competition row--boxed">
    <h1 class="page-competition__title"><?= $competition_term->name ?: "" ?></h1> <?php
    if ($competition_term->description) { ?>
        <h2 class="page-competition__subtitle"><?= $competition_term->description ?></h2> <?php
    } ?>

    <tbi-vue-page-competition data-slides='<?= esc_html(json_encode($competitions)) ?>'></tbi-vue-page-competition>
</div>