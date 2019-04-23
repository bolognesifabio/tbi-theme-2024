export default /* html */ `
    <div :class="bem_base">
        <button @click.prevent="add_turn()">Aggiungi turno</button>
        
        <ul :class="bem('list')">
            <li
                v-for="(turn, index) in $root.state.turns"
                :class="bem('list__item', { dragged: current_dragged && current_dragged.index === index })"
                @dragover.prevent="switch_turns(index)"
            >
                <div :class="bem('list__item__draggable')" draggable="true" @dragstart="set_current_dragged(index, turn)" @dragend="reset_current_dragged()"></div>
                <input :class="bem('list__item__value')" type="text" v-model="turn.name" />
            </li>
        </ul>
    </div>
`