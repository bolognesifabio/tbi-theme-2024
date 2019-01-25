import Vue from 'vue'

import './mixins/globals'
import './components/globals'
import './components/metaboxes'

import style from './style.scss'

if (document.getElementById('normal-sortables')) {
    new Vue({
        el: '#normal-sortables',
        data: {
            state: {}
        },
        style
    })
}