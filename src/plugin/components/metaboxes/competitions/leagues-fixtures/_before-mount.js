import Vue from 'vue'

export default function() {
    Vue.set(this.$root.state, 'turns', this.turns_input)
}