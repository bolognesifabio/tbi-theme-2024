<?php
$turns_meta = get_post_meta($post->ID, 'tbi-leagues-turns', true) ?: []; ?>

<tbi-competitions-turns-list inline-template :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'>
    <div :class="base_class">
        <p v-if="!$root.state.turns.length" :class="get_bem('no-turns-message')">Non ci sono turni per questa competizione.</p>
        
        <tbi-competitions-turn inline-template v-for="(turn, turn_index) in $root.state.turns" :turn="turn" :index="turn_index" :key="turn_index">
            <div :class="base_class"> <?php
                include "_turn-heading.php"; ?>

                    <tbi-competitions-fixture inline-template
                        v-for="(fixture, fixture_index) in turn.fixtures"
                        :fixture="fixture"
                        :index="fixture_index"
                        :turn_index="index"
                        :key="fixture_index"
                    >
                        <div>
                            <div
                                @dragover="event => prevent_if_droppable(event)"
                                @drop.prevent="drop_fixture()"
                                @dragstart="update_turns_dragged_data()"
                                draggable="true"
                            >D</h4>
                            <tbi-fixture-team-selection v-model="fixture.home"></tbi-fixture-team-selection>
                        </div>
                    </tbi-competitions-fixture>

                </div>
        </tbi-competitions-turn>
        
        <button :class="get_bem('add-turn')" @click.prevent="add_turn">Aggiungi un nuovo turno</button>
    </div>
</tbi-competitions-turns-list>