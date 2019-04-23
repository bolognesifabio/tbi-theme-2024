import Vue from 'vue'

import './mixins/globals'

if (document.getElementById('normal-sortables')) {
    new Vue({
        el: '#normal-sortables',
        data: { state: {} },
        components: {
            'tbi-competition-teams-filters': () => import('./components/metaboxes/competition-teams-filters'),
            'tbi-competition-teams-info': () => import('./components/metaboxes/competition-teams-info'),
            'tbi-competition-teams-list': () => import('./components/metaboxes/competition-teams-list'),
            'tbi-league-turns': () => import('./components/metaboxes/league-turns')
        }
    })
}