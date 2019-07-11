import Vue from 'vue'

Vue.component('tbi-vue-page-competition-seasons', {
    data() {
        return {
            selected_season: null
        }
    },

    props: ["default_season"],

    beforeMount() {
        this.selected_season = this.default_season
        this.redirect_to_season()
    },

    methods: {
        redirect_to_season() {
            const
                PROTOCOL = window.location.protocol,
                HOST = window.location.host,
                PATHNAME = window.location.pathname,
                URL_SEGMENTS = PATHNAME.split("/"),
                COMPETITION_TAXONOMY_NAME = URL_SEGMENTS[1],
                COMPETITION_SLUG = URL_SEGMENTS[2]

            window.location.href = `${PROTOCOL}//${HOST}/${COMPETITION_TAXONOMY_NAME}/${COMPETITION_SLUG}/${this.selected_season}/`
        }
    }
})