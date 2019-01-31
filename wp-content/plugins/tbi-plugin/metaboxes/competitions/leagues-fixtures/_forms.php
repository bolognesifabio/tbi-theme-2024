<?php
$turns_meta = get_post_meta($post->ID, 'tbi-leagues-fixtures', true) ?: []; ?>

<tbi-competitions-leagues-fixtures inline-template :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'>
    <div :class="base_class">
        <table v-for="(turn, turn_index) in $root.state.turns" :class="get_bem('turn')">
            <thead>
                <tr>
                    <th
                        colspan="4"
                        draggable="true"
                        @dragover="event => check_if_droppable(event, 'turn')"
                        @dragstart="drag_turn(turn_index)" 
                        @drop.prevent="drop_turn(turn_index)"
                    >
                        <span class="dashicons dashicons-menu"></span>
                        <input type="text" v-model="turn.name" :name="'tbi-league-fixtures[' + turn_index + '][name]'" />
                    </th>
                </tr>
                <tr>
                    <th colspan="2">Casa</th>
                    <th colspan="2">Trasferta</th>
                </tr>
            </thead>

            <tbody>
                <tr
                    v-for="(fixture, fixture_index) in turn.fixtures"
                    draggable="true"
                    :class="get_bem('turn__fixture')"
                    @dragover="event => check_if_droppable(event, 'fixture')"
                    @dragstart="drag_fixture(turn_index, fixture_index)" 
                    @drop.prevent="drop_fixture(turn_index, fixture_index)"
                >
                    <td><input type="text" v-model="fixture.home" :name="'tbi-league-fixtures[' + turn_index + '][fixtures][' + fixture_index + '][home]'" /></td>
                    <td>0</td>
                    <td>0</td>
                    <td><input type="text" v-model="fixture.away" :name="'tbi-league-fixtures[' + turn_index + '][fixtures][' + fixture_index + '][away]'" /></td>
                </tr>
                <tr
                    @dragover="event => check_if_droppable(event, 'fixture')"
                    @drop.prevent="drop_fixture(turn_index, turn.fixtures.length)"
                >
                    <td colspan="4">DROP</td>
                </tr>

                <tr>
                    <td colspan="4">
                        <tbi-find-as-you-type :terms="selected_teams_terms">
                            <input slot-scope="slot_props" :value="slot_props.output ? slot_props.output.key : null" />
                        </tbi-find-as-you-type>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <button @click.prevent="add_fixture(turn_index)">Aggiungi partita</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <button @click.prevent="add_turn()">Aggiungi turno</button>
    </div>
</tbi-competitions-leagues-fixtures>