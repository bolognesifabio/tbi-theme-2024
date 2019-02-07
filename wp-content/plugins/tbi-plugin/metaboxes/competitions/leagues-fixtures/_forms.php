<?php
$turns_meta = get_post_meta($post->ID, 'tbi-leagues-turns', true) ?: []; ?>

<tbi-competitions-leagues-turns inline-template :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'>
    <div :class="base_class">
        <p v-if="!$root.state.turns.length" :class="get_bem('no-turns-message')">Non ci sono turni per questa competizione.</p>

        <div v-for="turn in $root.state.turns" :class="get_bem('turn')">
            <tbi-drag-and-drop draggable_type="turn" :droppable_types="['turn', 'fixture']" :element="turn" :callback="() => {console.log(this.$root.state.dragged_object)}">
                <h3>{{ turn.name }}</h3>
            </tbi-drag-and-drop>

            <ul>
                <li v-for="(fixture, fixture_index) in turn.fixtures">
                    {{ fixture.home }} - {{ fixture.away }}
                </li>
            </ul>
            <hr/>
        </div>

        <button :class="get_bem('add-turn')" @click.prevent="add_turn">Aggiungi un nuovo turno</button>
    </div>
</tbi-competitions-leagues-turns>