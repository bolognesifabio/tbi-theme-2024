<?php
$turns_meta = get_post_meta($post->ID, 'tbi-competitions-turns', true) ?: []; ?>

<tbi-competitions-turns-list inline-template :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'>
    <div :class="base_class">
        <p v-if="!$root.state.turns.length" :class="get_bem('no-turns-message')">Non ci sono turni per questa competizione.</p>
        
        <tbi-competitions-turn inline-template v-for="(turn, turn_index) in $root.state.turns" :turn="turn" :index="turn_index" :key="turn_index">
            <div :class="[base_class, { 'dragged-over': is_dragged_over }]"> <?php
                include "_turn-heading.php"; ?>

                <div v-if="has_turn_fixtures" :class="get_bem('fixtures-heading')">
                    <h4 :class="get_bem('fixtures-heading__team')">Squadra in casa</h4>
                    <h4 :class="get_bem('fixtures-heading__results')">Risultato</h4>
                    <h4 :class="get_bem('fixtures-heading__team')">Squadra in trasferta</h4>
                    <h4 :class="get_bem('fixtures-heading__place')">Luogo</h4>
                    <h4 :class="get_bem('fixtures-heading__date')">Data</h4>
                </div>

                <div :class="get_bem('fixtures-list')">
                    <tbi-competitions-fixture inline-template
                        v-for="(fixture, fixture_index) in turn.fixtures"
                        :fixture="fixture"
                        :index="fixture_index"
                        :turn_index="index"
                        :key="fixture_index"
                    >
                        <div
                            :class="base_class" 
                            @dragover="event => prevent_if_droppable(event)"
                            @drop.prevent="drop_fixture"
                        >
                            <div
                                :class="get_bem('drag-area')"
                                @dragstart="update_turns_dragged_data"
                                draggable="true"
                            ></div>

                            <tbi-fixture-team-selection
                                v-model="fixture.home.team"
                                :index="index"
                                :turn_index="turn_index"
                                :is_home="true"
                            ></tbi-fixture-team-selection>

                            <input
                                type="number"
                                v-model="fixture.home.score"
                                :class="get_bem('score')"
                                :name="'tbi-competitions-turns[' + turn_index + '][fixtures][' + index + '][home][score]'"
                            />

                            <input
                                type="number"
                                v-model="fixture.away.score"
                                :class="get_bem('score')"
                                :name="'tbi-competitions-turns[' + turn_index + '][fixtures][' + index + '][away][score]'"
                            />
                            
                            <tbi-fixture-team-selection
                                v-model="fixture.away.team"
                                :index="index"
                                :turn_index="turn_index"
                                :is_home="false"
                            ></tbi-fixture-team-selection>
                            
                            <input
                                v-model="fixture.place"
                                type="text"
                                :class="get_bem('place')"
                                :name="'tbi-competitions-turns[' + turn_index + '][fixtures][' + index + '][place]'"
                            />

                            <input
                                v-model="fixture.date"
                                :class="get_bem('date')"
                                type="date"
                                :name="'tbi-competitions-turns[' + turn_index + '][fixtures][' + index + '][date]'"
                            />
                        </div>
                    </tbi-competitions-fixture>
                </div>
                

                    <!-- <tbi-competitions-fixture inline-template
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
                            >D</div>
                            <tbi-fixture-team-selection v-model="fixture.home"></tbi-fixture-team-selection>
                        </div>
                    </tbi-competitions-fixture> -->

            </div>
        </tbi-competitions-turn>
        
        <button :class="get_bem('add-turn')" @click.prevent="add_turn">Aggiungi un nuovo turno</button>
    </div>
</tbi-competitions-turns-list>