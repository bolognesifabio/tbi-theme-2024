<?php
use TBI\Controllers\Competition as Competition_Controller;

if (isset($_GET['stagione'])) $season_term = get_term_by('slug', isset($_GET['stagione']), 'seasons');
else {
    $season_term = get_terms([
        'taxonomy' => 'seasons',
        'orderby' => 'name',
        'order' => 'DESC',
        'number' => 1
    ])[0];
}

$competition_term = get_term_by('slug', 'competition-' . $post->ID, 'competitions');
$competitions = Competition_Controller::get_by_terms($competition_term->term_id, $season_term->term_id); ?>

<div class="page-competition row--boxed">
    <h1 class="page-competition__title"><?= $competition_term->name ?: "" ?></h1> <?php
    if ($competition_term->description) { ?>
        <h2 class="page-competition__subtitle"><?= $competition_term->description ?></h2> <?php
    } ?>

    <tbi-vue-page-competition data-slides='<?= json_encode($competitions) ?>'></tbi-vue-page-competition>
</div>