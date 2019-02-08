<?php
$turns_meta = get_post_meta($post->ID, 'tbi-leagues-turns', true) ?: []; ?>

<tbi-competitions-turns-list inline-template :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'>
    <div :class="base_class">
        <p v-if="!$root.state.turns.length" :class="get_bem('no-turns-message')">Non ci sono turni per questa competizione.</p>
        
        <tbi-competitions-turn
            v-for="(turn, turn_index) in $root.state.turns"
            :turn="turn"
            :index="turn_index"
            :key="turn_index"
        >
            <h3 slot="draggable-area">{{ turn.name }}</h3>
            <template slot="remove-turn-button">X</template>
            <template slot="add-fixture-button">Aggiungi una nuova partita</template>
            <hr/>

            <tbi-competitions-fixture
                v-for="(fixture, fixture_index) in turn.fixtures"
                :fixture="fixture"
                :index="fixture_index"
                :turn_index="turn_index"
                :key="fixture_index"
            >
                <p>{{ fixture.home }}</p>
                <tbi-fixture-team-selection
                    :competition_teams="competition_teams"
                    v-model="fixture.home"
                ></tbi-fixture-team-selection>
            </tbi-competitions-fixture>
        </tbi-competitions-turn>
        
        <button :class="get_bem('add-turn')" @click.prevent="add_turn">Aggiungi un nuovo turno</button>
    </div>
</tbi-competitions-turns-list>