import Vue from 'vue'

import './style.scss'

Vue.component('tbi-teams-list', {
    props: ['teams_input'],
    data() {
        return {
            teams: {}
        }
    },
    created() {
        this.teams = this.teams_input
    }
})

Vue.component('tbi-competitions-filters', {
    beforeCreate() {
        Vue.set(this.$root.state, 'are_inactive_visible', false)
        Vue.set(this.$root.state, 'are_unselected_visible', true)
    }
})