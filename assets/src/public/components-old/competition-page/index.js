import Vue from "vue"
import data from "./_data"
import computed from "./_computed"
import mounted from "./_mounted"
import methods from "./_methods"
import template from "./_template"

import round from '../widgets/fixtures/_round'

Vue.component('tbi-vue-page-competition', {
    data: data,
    computed: computed,
    components: {
        'tbi-vue-page-component-fixtures-round': round
    }, 
    methods: methods,
    mounted: mounted,
    template: template
})