import Vue from 'vue'

import './mixins/globals'
import './components/globals'
import './components/metaboxes'

import style from './style.scss'

if (document.getElementById('normal-sortables')) {
    new Vue({
        el: '#normal-sortables',
        data: { state: {} },
        components: {
            'tbi-teams-list': () => import('./components/metaboxes/teams-list'),
            'tbi-competitions-filters': () => import('./components/metaboxes/competitions-filters')
        },
        style
    })
}