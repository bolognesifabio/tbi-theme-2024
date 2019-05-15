import Vue from 'vue'

export default function() {
    Vue.set(this.$root.state, 'filters', {
        are_inactive_hidden: true,
        are_no_page_hidden: true,
        are_unselected_hidden: false
    })
}