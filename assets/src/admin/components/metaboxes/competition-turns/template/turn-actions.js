export default /* html */ `
    <button
        :class="bem('list__item__header__action', { delete: true })"
        @click.prevent="remove_turn(turn_index)"
    >
        <span class="dashicons dashicons-trash"></span>
    </button>
    
    <button
        :class="bem('list__item__header__action', { 'add-fixture': true })"
        @click.prevent="add_fixture(turn_index)"
    >
        <span class="dashicons dashicons-calendar"></span>
    </button>

    <button
        :class="bem('list__item__header__action', { 'add-separator': true })"
        @click.prevent="add_separator(turn_index)"
        v-if="is_cup"
    >
        <span class="dashicons dashicons-editor-insertmore"></span>
    </button>
    
    <button
        :class="bem('list__item__header__action', { open: true })"
        :disabled="!turn.fixtures.length"
        @click.prevent="toggle_open_status(turn_index)"
    >
        <span class="dashicons dashicons-arrow-down-alt2"></span>
    </button>
`