import TURN_DRAGGABLE_TEMPLATE from './template/turn-draggable'
import TURN_NAME_INPUT_TEMPLATE from './template/turn-name-input'
import TURN_ACTIONS_TEMPLATE from './template/turn-actions'
import TURN_DROPPABLES_TEMPLATE from './template/turn-droppables'
import FIXTURES_HEADER_TEMPLATE from './template/fixtures-header'
import FIXTURES_ITEM_TEMPLATE from './template/fixtures-item'

export default /* html */ `
    <div :class="bem_base">
        <button @click.prevent="add_turn">Aggiungi turno</button>
        
        <ul :class="bem('list')">
            <li v-for="(turn, turn_index) in $root.state.turns" :class="bem('list__item', { dragged: is_turn_dragged(turn_index), open: turn.is_open })">
                ${TURN_DRAGGABLE_TEMPLATE}
                ${TURN_NAME_INPUT_TEMPLATE}
                ${TURN_ACTIONS_TEMPLATE}
                ${TURN_DROPPABLES_TEMPLATE}                

                <table :class="bem('list__item__fixtures')">
                    <thead>
                        ${FIXTURES_HEADER_TEMPLATE}
                    </thead>
                    <tbody>
                        ${FIXTURES_ITEM_TEMPLATE}
                    </tbody>
                </table>
            </li>
        </ul>
    </div>
`