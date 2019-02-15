import Vue from 'vue'

export default function() {
    Vue.set(this.$root.state, 'turns', this.turns_input)
    Vue.set(this.$root.state, 'turns_dragged_data', null)
    Vue.set(this.$root.state, 'turns_copied_date', null)
}