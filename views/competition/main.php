<?php
use TBI\Controllers\Competition as Competition_Controller;
use TBI\Controllers\Competition\League as League_Controller;

$season_slug = get_query_var('season', false);

if ($season_slug) $season_term = get_term_by('slug', $season_slug, 'seasons');

if (!$season_term) {
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

$all_seasons = Competition_Controller::get_all_seasons($competition_term);
?>

<div class="page-competition row--boxed">
    <header class="page-competition__header">
        <h1 class="page-competition__header__title"><?= $competition_term->name ?: "" ?></h1> <?php
        if ($post->post_excerpt) { ?>
            <h2 class="page-competition__header__subtitle"><?= $post->post_excerpt ?></h2> <?php
        } ?>

        <tbi-vue-page-competition-seasons inline-template default_season="<?= $season_term->slug ?>" >
            <div class="page-competition__header__seasons">
                <select class="page-competition__header__seasons__nav" v-model="selected_season" @change="redirect_to_season"> <?php
                    foreach ($all_seasons as $season_slug => $season_name) { ?>
                        <option value="<?= $season_slug ?>" <?= $season_slug == $season_term->slug ? "checked" : "" ?>><?= $season_name ?></option> <?php
                    } ?>
                </select>

                <i class="page-competition__header__seasons__arrow fas fa-sort-down"></i>
            </div>
        </tbi-vue-page-competition-seasons>
    </header>

    <tbi-vue-page-competition data-slides='<?= esc_html(json_encode($competitions)) ?>'></tbi-vue-page-competition>
</div>