export const get_turn_by_index = function(turn_index) {
    return this.$root.state.turns[turn_index] || null
}

export const get_fixture_by_index = function(turn_index, fixture_index) {
    let turn = this.get_turn_by_index(turn_index)
    return turn ? turn.fixtures[fixture_index] || null : null
}