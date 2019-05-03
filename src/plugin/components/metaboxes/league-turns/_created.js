import Vue from 'vue'

export default function() {
    Vue.set(this.$root.state, 'turns', this.turns_input.map(turn => {
        turn.fixtures = turn.fixtures || []
        turn.is_open = false
        return turn
    }))
}