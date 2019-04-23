export default /* html */ `
    <div :class="bem_base">
        <button @click.prevent="add_turn()">Aggiungi turno</button>
        
        <ul :class="bem('list')">
            <li
                v-for="(turn, index) in $root.state.turns"
                :class="bem('list__item', { dragged: is_turn_dragged(index), open: turn.is_open })"
                @dragover.prevent="switch_turns(index)"
            >
                <div :class="bem('list__item__draggable')" draggable="true" @dragstart="set_current_dragged(index, turn)" @dragend="reset_current_dragged"></div>
                <input :class="bem('list__item__value')" type="text" v-model="turn.name" :name="'tbi-competition-turns[' + index + '][name]'" />
                <button :class="bem('list__item__delete')"></button>
                <button :class="bem('list__item__add')"></button>
                <button :class="bem('list__item__open')" @click.prevent="toggle_open_status(index)"></button>

                <table>
                    <tbody>
                        <tr v-for="fixture in turn.fixtures">
                            <td>{{ fixture }}</td>
                        </tr>
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
`