import Vue from "vue"
import axios from 'axios'
import round from './_round'

Vue.component('tbi-vue-widget-fixtures', {
    data() {
        return {
            slides: [],
            base_class: 'widget-fixtures',
            is_loading: true
        }
    },
    mounted() {
        let { competitions, seasons } = JSON.parse(this.$el.dataset.slides)
        this.$el.dataset.slides = ""
        this.slides = []

        Promise.all(competitions.map(competition => {
            return axios.get(`${window.location.protocol}//${window.location.host}/index.php/wp-json/tbi/v1/competition/${competition}/season/${seasons}/fixtures`)
        })).then(results => {
            this.is_loading = false

            this.slides = results.map(result => { return result.data }).reduce((output, data) => {
                data = data.map(competition => {
                    competition.turns = competition.turns.map(turn => {
                        turn.id = turn.name
                        return turn
                    })
                    return competition
                })

                return output.concat(data)
            }, [])
        })
    },
    components: {
        'tbi-vue-widget-fixtures-round': round
    },
    template: `
    <div>
        <tbi-vue-carousel
            :slides="slides"
            :base_class="base_class"
            :arrows="true"
        >
            <template slot="slide" slot-scope="slot_props">
                <h3 :class="slot_props.base_class + '__title'">{{ slot_props.slide.title }}</h3>

                <tbi-vue-widget-fixtures-round
                    :slides="slot_props.slide.turns"
                    :teams="slot_props.slide.teams"
                    :base_class="slot_props.base_class + '__rounds'"
                ></tbi-vue-widget-fixtures-round>
            </template>
        </tbi-vue-carousel>
        <div v-if="is_loading" class="loading-layer">
            <i class="loading-layer__icon fas fa-circle-notch"></i>
            <p class="loading-layer__text">Caricamento</p>
        </div>
    </div>
    `
})