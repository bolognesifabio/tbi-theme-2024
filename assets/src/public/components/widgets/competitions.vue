<script>
    import axios from 'axios'

    import data_model_mixin from '../mixins/data-model.vue'

    export default {
        mixins: [ data_model_mixin ],

        computed: {
            loaded_competitions() {
                // if (!this.model.competitions.length) return []

                // return this.model.filter(competition => {
                //     return competition.turns
                // })
            }
        },

        mounted() {
            // if (!this.model.length) return

            // Promise.all(this.model.map(async competition => {
            //     let asd = await axios.get(`${window.location.protocol}//${window.location.host}/index.php/wp-json/tbi/v1/competition/${competition}/season/${seasons}/leagues/fixtures`)
            // }))

            // for (let competition of this.model) {
            //     if (competition.turns) return

            //     let new_model = this.model


            // }
            // Promise.all(competitions.map(competition => {
            //     return axios.get(`${window.location.protocol}//${window.location.host}/index.php/wp-json/tbi/v1/competition/${competition}/season/${seasons}/leagues/fixtures`)
            // })).then(results => {
            //     this.is_loading = false

            //     for (let result of results) {
            //         for (let competition of result.data) {
            //             competition.turns = competition.turns.map(turn => {
            //                 turn.id = turn.name
            //                 return turn
            //             })
                        
            //             this.slides.push(competition)
            //         }
            //     }
            // })
        }
    }
</script>