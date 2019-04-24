import TURN_DRAGGABLE_TEMPLATE from './_turn-draggable'
import TURN_NAME_INPUT_TEMPLATE from './_turn-name-input'
import TURN_ACTIONS_TEMPLATE from './_turn-actions'
import TURN_DROPPABLES_TEMPLATE from './_turn-droppables'
import FIXTURE_TEMPLATE from './_fixture'

export default /* html */ `
    <div :class="bem_base">
        <button @click.prevent="add_turn">Aggiungi turno</button>
        
        <ul :class="bem('list')">
            <li v-for="(turn, turn_index) in $root.state.turns" :class="bem('list__item', { dragged: is_turn_dragged(turn_index), open: turn.is_open })">
                ${TURN_DRAGGABLE_TEMPLATE}
                ${TURN_NAME_INPUT_TEMPLATE}
                ${TURN_ACTIONS_TEMPLATE}
                ${TURN_DROPPABLES_TEMPLATE}                

                <table>
                    <tbody>
                        ${FIXTURE_TEMPLATE}
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
`