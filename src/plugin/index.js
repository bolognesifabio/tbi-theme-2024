import Vue from 'vue'

import './mixins/globals'

if (document.getElementById('normal-sortables')) {
    new Vue({
        el: '#normal-sortables',
        data: { state: {} },
        components: {
            'tbi-competition-teams-filters': () => import('./components/metaboxes/competition-teams-filters'),
            'tbi-competition-teams-info': () => import('./components/metaboxes/competition-teams-info'),
            'tbi-competition-teams-list': () => import('./components/metaboxes/competition-teams-list')
        }
    })
}


// components: {
//             'tbi-competitions-filters': () => import('./components/metaboxes/competitions/filters'),
//             'tbi-competitions-teams-list': () => import('./components/metaboxes/competitions/teams-list'),
//             'tbi-competitions-teams-info': () => import('./components/metaboxes/competitions/teams-info'),
//             'tbi-competitions-turns-list': () => import('./components/metaboxes/competitions/turns-list')
//         },