export default {
    add_turn() {
        this.$root.state.turns.push({
            name: 'Nuovo turno',
            fixtures: []
        })
    },

    switch_turns(index) {
        const IS_DRAGGABLE_MOVING_DOWN = index > this.current_dragged.index
        this.$root.state.turns.splice(index + IS_DRAGGABLE_MOVING_DOWN, 0, this.current_dragged.turn)
        this.$root.state.turns.splice(this.current_dragged.index + !IS_DRAGGABLE_MOVING_DOWN, 1)
        this.current_dragged.index = index
    },
    
    set_current_dragged(index, turn) {
        this.current_dragged = { index, turn }
    },

    reset_current_dragged() {
        this.current_dragged = null
    },

    is_turn_dragged(index) {
        return this.current_dragged && this.current_dragged.index === index
    },

    toggle_open_status(index) {
        this.$root.state.turns[index].is_open = !this.$root.state.turns[index].is_open
    }
}