<?php
$turns_meta = get_post_meta($post->ID, 'tbi-leagues-fixtures', true) ?: []; ?>

<tbi-competitions-leagues-fixtures inline-template :turns_input='<?= htmlspecialchars(json_encode($turns_meta), ENT_QUOTES) ?>'>
    <div :class="base_class">
        <table v-for="(turn, turn_index) in $root.state.turns" :class="get_bem('turn')"> <?php
            include '_table-head.php'; ?>

            <tbody>
                <tr
                    v-for="(fixture, fixture_index) in turn.fixtures"
                    draggable="true"
                    :class="get_bem('turn__fixture')"
                    @dragover="event => check_if_droppable(event, 'fixture')"
                    @dragstart="drag_fixture(turn_index, fixture_index)" 
                    @drop.prevent="drop_fixture(turn_index, fixture_index)"
                >
                    <td>
                        <tbi-fixture-team-selection
                            :competition_teams="competition_teams"
                            v-model="fixture.home"
                        ></tbi-fixture-team-selection>
                    </td>
                    <td>0</td>
                    <td>0</td>
                    <td>
                        <tbi-fixture-team-selection
                            :competition_teams="competition_teams"
                            v-model="fixture.away"
                        ></tbi-fixture-team-selection>
                    </td>
                </tr>
                <tr
                    @dragover="event => check_if_droppable(event, 'fixture')"
                    @drop.prevent="drop_fixture(turn_index, turn.fixtures.length)"
                >
                    <td colspan="8">DROP</td>
                </tr>

                <tr>
                    <td colspan="8">
                        <button @click.prevent="add_fixture(turn_index)">Aggiungi partita</button>
                    </td>
                </tr>
            </tbody>
        </table>

        <button @click.prevent="add_turn()">Aggiungi turno</button>
    </div>
</tbi-competitions-leagues-fixtures>