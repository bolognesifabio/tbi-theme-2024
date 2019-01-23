import Vue from 'vue'

import style from './style.scss'

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

if (document.getElementById('normal-sortables')) {
    new Vue({
        el: '#normal-sortables',
        data: {
            teams: 'asdada'
        },
        style
    })
}