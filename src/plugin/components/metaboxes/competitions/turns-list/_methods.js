export default {
    add_turn() {
        this.$root.state.turns.push({
            name: 'Nuovo turno',
            fixtures: []
        })
    }
}