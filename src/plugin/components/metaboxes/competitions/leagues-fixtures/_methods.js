export default {
    drag_fixture(turn_index, fixture_index) {
        this.dragged_object = { turn_index, fixture_index, type: 'fixture' }
    },

    drop_fixture(turn_index, fixture_index) {
        let { turns } = this.$root.state,
            removed_fixture = turns[this.dragged_object.turn_index].fixtures.splice(this.dragged_object.fixture_index, 1)[0]

        turns[turn_index].fixtures.splice(fixture_index, 0, removed_fixture)
        this.dragged_object = null
    },

    drag_turn(turn_index) {
        this.dragged_object = { turn_index, type: 'turn' }
    },

    drop_turn(turn_index) {
        let { turns } = this.$root.state,
            removed_turn = turns.splice(this.dragged_object.turn_index, 1)[0]

        turns.splice(turn_index, 0, removed_turn)
        this.dragged_object = null
    },

    check_if_droppable(event, type) {
        if (this.dragged_object.type === type) event.preventDefault()
    }
}