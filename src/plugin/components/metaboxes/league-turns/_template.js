import TURN_DRAGGABLE_TEMPLATE from './template/turn-draggable'
import TURN_NAME_INPUT_TEMPLATE from './template/turn-name-input'
import TURN_ACTIONS_TEMPLATE from './template/turn-actions'
import TURN_DROPPABLES_TEMPLATE from './template/turn-droppables'
import FIXTURES_HEADER_TEMPLATE from './template/fixtures-header'
import FIXTURES_ITEM_TEMPLATE from './template/fixtures-item'

export default /* html */ `
    <div :class="bem_base">
        <button :class="bem('add')" @click.prevent="add_turn">Aggiungi un nuovo turno</button>

        <p v-if="!has_at_least_one_turn">Non ci sono ancora turni per questa competizione.</p>
        
        <ul :class="bem('list')">
            <li v-for="(turn, turn_index) in $root.state.turns" :class="bem('list__item', { dragged: is_turn_dragged(turn_index), open: turn.is_open && turn.fixtures.length })">
                <header :class="bem('list__item__header')">
                    ${TURN_DRAGGABLE_TEMPLATE}
                    ${TURN_NAME_INPUT_TEMPLATE}
                    ${TURN_ACTIONS_TEMPLATE}
                    ${TURN_DROPPABLES_TEMPLATE}                
                </header>

                <table :class="bem('list__item__fixtures')" cellpadding="2" cellspacing="0">
                    <thead :class="bem('list__item__fixtures__header')">
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