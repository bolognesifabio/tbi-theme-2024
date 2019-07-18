import Vue from 'vue'

import './mixins/globals'

if (document.getElementById('normal-sortables')) {
    new Vue({
        el: '#normal-sortables',
        data: {
            state: {}
        }
    })
}