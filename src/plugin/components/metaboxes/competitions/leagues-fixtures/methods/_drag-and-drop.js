export const drag_fixture = function(turn_index, fixture_index) {
    this.dragged_object = { turn_index, fixture_index, type: 'fixture' }
}

export const drop_fixture = function(turn_index, fixture_index) {
    let
        source_turn = this.get_turn_by_index(this.dragged_object.turn_index),
        target_turn = this.get_turn_by_index(turn_index),
        removed_fixture = source_turn.fixtures.splice(this.dragged_object.fixture_index, 1)[0]

    target_turn.fixtures.splice(fixture_index, 0, removed_fixture)
    this.dragged_object = null
}

export const drag_turn = function(turn_index) {
    this.dragged_object = { turn_index, type: 'turn' }
}

export const drop_turn = function(turn_index) {
    let { turns } = this.$root.state,
        removed_turn = turns.splice(this.dragged_object.turn_index, 1)[0]

    turns.splice(turn_index, 0, removed_turn)
    this.dragged_object = null
}

export const check_if_droppable = function(event, type) {
    if (this.dragged_object.type === type) event.preventDefault()
}