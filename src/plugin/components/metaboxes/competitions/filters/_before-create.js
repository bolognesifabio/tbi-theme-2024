import Vue from 'vue'

export default function() {
    Vue.set(this.$root.state, 'are_inactive_hidden', true)
    Vue.set(this.$root.state, 'are_unselected_hidden', false)
}