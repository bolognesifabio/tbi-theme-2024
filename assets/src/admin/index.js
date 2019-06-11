import Vue from 'vue'

import './mixins/globals'

if (document.getElementById('normal-sortables')) {
    new Vue({
        el: '#normal-sortables',
        data: { state: {} },
        components: {
            'tbi-competition-teams-filters': () => import('./components/metaboxes/competition/teams/filters.vue'),
            'tbi-competition-teams-info': () => import('./components/metaboxes/competition-teams-info'),
            'tbi-competition-teams-list': () => import('./components/metaboxes/competition-teams-list'),
            'tbi-competition-turns': () => import('./components/metaboxes/competition-turns')
        }
    })
}