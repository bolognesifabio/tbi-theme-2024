<?php
$turns_meta = get_post_meta($post->ID, 'tbi-competitions-turns', true) ?: []; ?>

<tbi-competitions-turns-list inline-template :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'>
    <div :class="base_class">
        <p v-if="!$root.state.turns.length" :class="get_bem('no-turns-message')">Non ci sono turni per questa competizione.</p>
        
        <tbi-competitions-turn inline-template v-for="(turn, turn_index) in $root.state.turns" :turn="turn" :index="turn_index" :key="turn_index">
            <div :class="[base_class, { 'dragged-over': is_dragged_over }]"> <?php
                include "_turn-headings.php";
                include "_fixture.php"; ?>
            </div>
        </tbi-competitions-turn>
        
        <button :class="get_bem('add-turn')" @click.prevent="add_turn">Aggiungi un nuovo turno</button>
    </div>
</tbi-competitions-turns-list>