import Vue from 'vue'

export default function() {
    Vue.set(this.$root.state, 'teams', this.teams_input)
}