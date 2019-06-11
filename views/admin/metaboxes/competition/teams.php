<?php
use TBI\Controllers\Team;

$is_competition_cup = get_post_type($post->ID) === 'cups' ? "true" : "false";
$meta_teams = get_post_meta($post->ID, $this->meta_name, true) ?: [];

$all_teams = array_map(function($team) use($meta_teams) {
    $team->is_selected = array_key_exists($team->id, $meta_teams);
    $team->competition_info = $team->is_selected ? $meta_teams[$team->id] : [
        'name' => $team->title,
        'short_name' => $team->short_name,
        'code' => $team->code,
        'penalty' => 0,
        'priority' => 0,
        'is_not_in_standings' => false
    ];
    return $team;
}, Team::get_all()); ?>

<div class="<?= $this->bem_base ?>">
    <tbi-competition-teams-filters>
        <!-- <div :class="bem_base">
            <h4 :class="bem('title')">Filtri</h4>
            <div :class="bem('field')">
                <input :class="bem('field__value')" type="checkbox" v-model="$root.state.filters.are_inactive_hidden" />
                <label :class="bem('field__label')">Mostra solo squadre attive</label>
            </div>

            <div :class="bem('field')">
                <input :class="bem('field__value')" type="checkbox" v-model="$root.state.filters.are_no_page_hidden" />
                <label :class="bem('field__label')">Mostra solo squadre con una pagina</label>
            </div>

            <div :class="bem('field')">
                <input :class="bem('field__value')" type="checkbox" v-model="$root.state.filters.are_unselected_hidden" />
                <label :class="bem('field__label')">Mostra solo squadre selezionate</label>
            </div>
        </diV> -->
    </tbi-competition-teams-filters>
    
    <tbi-competition-teams-list :teams_input='<?= htmlspecialchars(json_encode($all_teams), ENT_QUOTES) ?>'></tbi-competition-teams-list>
    <tbi-competition-teams-info :is_cup=<?= $is_competition_cup ?>></tbi-competition-teams-info>
</div>