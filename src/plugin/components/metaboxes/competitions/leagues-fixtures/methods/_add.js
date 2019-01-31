export const add_turn = function() {
    this.$root.state.turns.push({
        name: 'Nuovo turno',
        fixtures: []
    })
}

export const add_fixture = function(turn_index) {
    let turn = this.get_turn_by_index(turn_index)
    turn.fixtures.push({
        home: null,
        away: null
    })
}