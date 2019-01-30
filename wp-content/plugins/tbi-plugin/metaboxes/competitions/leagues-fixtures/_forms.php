<tbi-competitions-leagues-fixtures inline-template>
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
                    >{{ turn.name }}</th>
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
                    <td>{{ fixture.name }}</td>
                    <td>0</td>
                    <td>0</td>
                    <td>{{ fixture.name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</tbi-competitions-leagues-fixtures>