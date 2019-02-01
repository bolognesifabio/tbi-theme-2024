<?php
$turns_meta = get_post_meta($post->ID, 'tbi-leagues-fixtures', true) ?: []; ?>

<tbi-competitions-leagues-fixtures inline-template :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'>
    <div :class="base_class">
        <p v-if="!$root.state.turns.length" :class="get_bem('no-turns-message')">Non ci sono turni per questa competizione.</p>

        <div v-for="(turn, turn_index) in $root.state.turns" :class="get_bem('turn')">
            <div :class="get_bem('turn__heading')">
                <h4
                    :class="get_bem('turn__heading__drag-area')"
                    draggable="true"
                    @dragover="event => check_if_droppable(event, 'turn')"
                    @drop.prevent="drop_turn(turn_index)"
                    @dragstart="drag_turn(turn_index)"
                >{{ turn.name }}</h4>
                <input :class="get_bem('turn__heading__input')" v-model="turn.name" />
            </div>

            <table :class="get_bem('turn__fixtures')">
                <thead>
                    <tr>
                        <th></th>
                        <th colspan="2">Squadra in casa</th>
                        <th colspan="3">Risultato</th>
                        <th colspan="2">Squadra in trasferta</th>
                        <th>Localit&agrave;</th>
                        <th>Data</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <tr
                        v-for="(fixture, fixture_index) in turn.fixtures"
                        :class="get_bem('turn__fixtures__element')"
                        @dragover="event => check_if_droppable(event, 'fixture')"
                        @drop.prevent="drop_fixture(turn_index, fixture_index)"
                    >
                        <td
                            :class="get_bem('turn__fixtures__element__drag-area')"
                            draggable="true"
                            @dragstart="drag_fixture(turn_index, fixture_index)" 
                        >{{ fixture_index }}</td>
                        <td>@</td>
                        <td>
                            <tbi-fixture-team-selection :competition_teams="competition_teams" v-model="fixture.home"></tbi-fixture-team-selection>
                        </td>
                        <td>0</td>
                        <td>-</td>
                        <td>0</td>
                        <td>
                            <tbi-fixture-team-selection :competition_teams="competition_teams" v-model="fixture.home"></tbi-fixture-team-selection>
                        </td>
                        <td>@</td>
                        <td>Maddaloni</td>
                        <td>31/08/1989</td>
                        <td>C</td>
                    </tr>
                </tbody>
            </table>

            <button :class="get_bem('turn__add-fixture')" @click.prevent="add_fixture(turn_index)">Aggiungi una nuova partita</button>
        </div>

        <button :class="get_bem('add-turn')" @click.prevent="add_turn">Aggiungi un nuovo turno</button>
    </div>
</tbi-competitions-leagues-fixtures>