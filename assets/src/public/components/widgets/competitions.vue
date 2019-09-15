<script>
    import axios from 'axios'

    import data_model_mixin from '../mixins/data-model.vue'

    export default {
        mixins: [ data_model_mixin ],

        data() {
            return {
                slide: 'next'
            }
        },

        computed: {
            loaded_competitions() {
                if (!this.model.length) return []

                return this.model.filter(competition => {
                    return competition.turns
                })
            },

            season() {
                return this.model[0].season
            }
        },

        async mounted() {
            if (!this.model.length) return

            this.model = await Promise.all(this.model.map(async (competition, index) => {
                if (competition.turns) return competition 

                let { data } = await axios.get(`${window.location.protocol}//${window.location.host}/index.php/wp-json/tbi/v1/competition/id/${competition.id}/`)
                data.is_active = false
                return data
            }))
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../styles/constants';

    .widget--competitions {
        &__nav {
            display: flex;
            padding: 1.5rem;
            border-bottom: .1rem solid $color-borders;

            &__competitions {
                flex-basis: 100%;
                padding: 0 1.5rem;

                &__item {
                    &__title,
                    &__subtitle {
                        margin: 0;
                        text-align: center;
                    }

                    &__title {
                        font-size: 1.6rem;
                        text-transform: uppercase;
                    }

                    &__subtitle {
                        font-size: 1.4rem;
                        color: $color-fg-accent;
                        font-weight: 600;
                    }
                }
            }

            &__cta {
                font-size: 2.4rem;
                color: $color-primary-main;
            }
        }
    }
</style>