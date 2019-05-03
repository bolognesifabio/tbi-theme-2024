export default {
    has_at_least_one_turn() {
        let turns = this.$root.state.turns || []
        return turns.length
    }
}