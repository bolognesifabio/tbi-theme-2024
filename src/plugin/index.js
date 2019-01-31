import Vue from 'vue'

import './mixins/globals'
import './components/globals'
import './components/metaboxes'

import style from './style.scss'

if (document.getElementById('poststuff')) {
    new Vue({
        el: '#post-body',
        data: { state: {} },
        components: {
            'tbi-competitions-filters': () => import('./components/metaboxes/competitions/filters'),
            'tbi-competitions-teams-list': () => import('./components/metaboxes/competitions/teams-list'),
            'tbi-competitions-teams-info': () => import('./components/metaboxes/competitions/teams-info'),
            'tbi-competitions-leagues-fixtures': () => import('./components/metaboxes/competitions/leagues-fixtures')
        },
        style
    })
}