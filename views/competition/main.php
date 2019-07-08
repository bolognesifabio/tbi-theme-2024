<?php
use TBI\Controllers\Competition as Competition_Controller;

if (isset($_GET['stagione'])) $season_term = get_term_by('slug', $_GET['stagione'], 'seasons');
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

    <tbi-vue-tabs inline-template data-tabs='<?= json_encode($competitions) ?>'>
        <div>
            <h2 v-for="tab in tabs">{{ tab.title }}</h2>

            <tbi-vue-fixt v-for="tab in tabs" inline-template :fixtures="tab.turns">
                <div>
                    <h3 v-for="turn in fixtures">{{ turn.name }}</h3>
                </div>
            </tbi-vue-fixt>
        </div>
    </tbi-vue-tabs>

</div>