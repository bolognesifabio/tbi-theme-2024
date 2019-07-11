import Vue from 'vue'

Vue.component('tbi-vue-page-competition-seasons', {
    data() {
        return {
            selected_season: null
        }
    },

    methods: {
        redirect_to_season() {
            console.log(this.selected_season)

            // window.location.href = `?`
        }
    }
})