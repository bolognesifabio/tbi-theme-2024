export default /* html */ `
    <button
        :class="bem('list__item__header__delete')"
        @click.prevent="remove_turn(turn_index)"
    ></button>
    
    <button
        :class="bem('list__item__header__add')"
        @click.prevent="add_fixture(turn_index)"
    ></button>
    
    <button
        :class="bem('list__item__header__open')"
        :disabled="!turn.fixtures.length"
        @click.prevent="toggle_open_status(turn_index)"
    ></button>
`