export default {
    add_turn() {
        this.$root.state.turns.push({
            name: 'Nuovo turno',
            fixtures: []
        })
    },

    remove_turn(index) {
        this.$root.state.turns.splice(index, 1)
    },

    switch_turns(event, index) {
        if (this.current_dragged_turn) {
            const IS_DRAGGABLE_MOVING_DOWN = index > this.current_dragged_turn.index

            event.preventDefault()

            this.$root.state.turns.splice(index + IS_DRAGGABLE_MOVING_DOWN, 0, this.current_dragged_turn.turn)
            this.$root.state.turns.splice(this.current_dragged_turn.index + !IS_DRAGGABLE_MOVING_DOWN, 1)
            this.current_dragged_turn.index = index
        }
    },

    set_current_dragged_turn(index, turn) {
        this.current_dragged_turn = { index, turn }
    },

    reset_current_dragged_turn() {
        this.current_dragged_turn = null
    },

    is_turn_dragged(index) {
        return this.current_dragged_turn && this.current_dragged_turn.index === index
    },

    toggle_open_status(index) {
        this.$root.state.turns[index].is_open = !this.$root.state.turns[index].is_open
    }
}