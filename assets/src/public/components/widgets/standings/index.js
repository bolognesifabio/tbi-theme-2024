import Vue from "vue"
import axios from 'axios'

Vue.component('tbi-vue-widget-standings', {
    data() {
        return {
            slides: [],
            base_class: 'widget-standings',
            is_loading: true
        }
    },
    mounted() {
        let { competitions, seasons } = JSON.parse(this.$el.dataset.slides)
        this.$el.dataset.slides = ""
        this.slides = []

        Promise.all(competitions.map(competition => {
            return axios.get(`${window.location.protocol}//${window.location.host}/index.php/wp-json/tbi-plugin/v1/competitions/standings/${competition}/${seasons}`)
        })).then(results => {
            this.is_loading = false

            this.slides = results.map(result => { return result.data }).reduce((output, data) => {
                return output.concat(data)
            }, [])
        })
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
                    
                    <table :class="slot_props.base_class + '__table'" cellpadding="0" cellspacing="0">
                        <thead>
                            <tr>
                                <th :class="slot_props.base_class + '__table__position'">Pos</th>
                                <th :class="slot_props.base_class + '__table__team'">Squadra</th>
                                <th :class="slot_props.base_class + '__table__played'">G</th>
                                <th :class="slot_props.base_class + '__table__points'">Pt</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(team, index) in slot_props.slide.teams">
                                <td :class="slot_props.base_class + '__table__position'">{{ index + 1 }}</td>
                                <td :class="slot_props.base_class + '__table__team'">{{ team.alias || team.title }}</td>
                                <td :class="slot_props.base_class + '__table__played'">{{ team.stats.played }}</td>
                                <td :class="slot_props.base_class + '__table__points'">{{ team.points }}</td>
                            </tr>
                        </tbody>
                    </table>
                </template>
            </tbi-vue-carousel>
            <div v-if="is_loading" class="loading-layer">
                <i class="loading-layer__icon fas fa-circle-notch"></i>
                <p class="loading-layer__text">Caricamento</p>
            </div>
        </div>
    `
})