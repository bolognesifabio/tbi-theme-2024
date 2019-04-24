export default /* html */ `
    <div :class="bem_base">
        <button @click.prevent="add_turn">Aggiungi turno</button>
        
        <ul :class="bem('list')">
            <li
                v-for="(turn, turn_index) in $root.state.turns"
                :class="bem('list__item', { dragged: is_turn_dragged(turn_index), open: turn.is_open })" 
            >
                <div
                    :class="bem('list__item__draggable')"
                    draggable="true"
                    @dragstart="set_current_dragged_turn(turn_index, turn)"
                    @dragend="reset_current_dragged_turn"
                    @dragover="event => switch_turns(event, turn_index)"
                ></div>
                <input :class="bem('list__item__value')" type="text" v-model="turn.name" :name="'tbi-competition-turns[' + turn_index + '][name]'" />
                <button :class="bem('list__item__delete')"></button>
                <button :class="bem('list__item__add')"></button>
                <button :class="bem('list__item__open')" @click.prevent="toggle_open_status(turn_index)"></button>
                <div :class="bem('list__item__droppable')" @dragover="event => switch_turns(event, turn_index)" v-if="current_dragged_turn"></div>

                <table>
                    <tbody>
                        <tr v-for="(fixture, fixture_index) in turn.fixtures" @dragover="event => switch_fixtures(event, turn_index, fixture_index)">
                            <td>
                                <div draggable="true" @dragstart="set_current_dragged_fixture(turn_index, fixture_index, fixture)" @dragend="reset_current_dragged_fixture">X</div>
                                {{ fixture }}</td>
                            </tr>
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
`