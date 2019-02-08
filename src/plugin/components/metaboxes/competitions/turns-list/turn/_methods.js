export default {
    prevent_if_droppable(event) {
        if (this.$root.state.turns_dragged_data.type === 'turn' && !this.is_currently_dragged) {
            event.preventDefault()
            this.is_dragged_over = true
        }
    },

    remove_dragged_over_class() {
        this.is_dragged_over = false
    },

    drop_turn() {
        let { turns, turns_dragged_data } = this.$root.state,
            removed_turn = turns.splice(turns_dragged_data.index, 1)[0]
            
        turns.splice((this.index - 1), 0, removed_turn)
        turns_dragged_data = null
        this.is_dragged_over = false
    },

    update_turns_dragged_data() {
        this.is_currently_dragged = true
        this.$root.state.turns_dragged_data = {
            index: this.index,
            type: 'turn'
        }
    },

    remove_turn() {
        this.$root.state.turns.splice(this.index, 1)
    },

    add_fixture() {
        this.$root.state.turns[this.index].fixtures.push({
            home: null,
            away: null
        })
    }
}