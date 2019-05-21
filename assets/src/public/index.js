import Vue from 'vue'
import './components'

if (document.getElementById('tbi-vue')) {
    new Vue({
        el: '#tbi-vue'
    })
}

if (document.getElementById('tbi-vue-header')) {
    new Vue({
        el: '#tbi-vue-header'
    })
}