import Vue from 'vue'

import './components-old'

if (document.getElementById('tbi-vue')) {
    new Vue({
        el: '#tbi-vue',
        components: {
            "tbi-top-menu": () => import('./components/layout/top-menu.vue')
        }
    })
}