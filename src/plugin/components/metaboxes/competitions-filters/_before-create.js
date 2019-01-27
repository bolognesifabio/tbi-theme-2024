import Vue from 'vue'

export default function() {
    Vue.set(this.$root.state, 'are_inactive_visible', false)
    Vue.set(this.$root.state, 'are_unselected_visible', true)
}