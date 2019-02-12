export default {
    prevent_if_droppable(event) {
        console.log('fixture')
        if (this.$root.state.turns_dragged_data.type === 'fixture') event.preventDefault()
    },

    drop_fixture() {
        let { turns, turns_dragged_data } = this.$root.state,
            removed_fixture = turns[turns_dragged_data.turn_index].fixtures.splice(turns_dragged_data.index, 1)[0]
            
        turns[this.turn_index].fixtures.splice(this.index, 0, removed_fixture)
        turns_dragged_data = null
    },

    update_turns_dragged_data() {
        this.$root.state.turns_dragged_data = {
            index: this.index,
            turn_index: this.turn_index,
            type: 'fixture'
        }
    }
}