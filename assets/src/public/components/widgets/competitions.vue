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

            active_index() {
                return this.loaded_competitions.findIndex(competition => {
                    return competition.is_active
                })
            },

            season() {
                return this.model[0].season
            }
        },

        methods: {
            next_slide() {
                this.slide = 'next'
                
                const
                    LOADED_COMPETITIONS = this.loaded_competitions,
                    NEXT_INDEX = this.active_index + 1 >= LOADED_COMPETITIONS.length ? 0 : this.active_index + 1

                this.model = this.model.map((competition, index) => {
                    competition.is_active = index === NEXT_INDEX
                    return competition
                })                
            },

            prev_slide() {
                this.slide = 'prev'
                
                const
                    LOADED_COMPETITIONS = this.loaded_competitions,
                    PREV_INDEX = this.active_index - 1 < 0 ? LOADED_COMPETITIONS.length - 1 : this.active_index - 1

                this.model = this.model.map((competition, index) => {
                    competition.is_active = index === PREV_INDEX
                    return competition
                })                
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
            margin: 0 1.5rem;
            align-items: center;
                        border-bottom: .1rem solid $color-borders;      // to change

            &__competitions {
                flex-basis: 100%;
                position: relative;
                overflow: hidden;

                &__item {
                    width: 100%;
                    padding: 1.5rem;

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

                    &.next,
                    &.prev {
                        &-enter-active,
                        &-leave-active {
                            transition: all .4s ease-in-out;
                        }

                        &-enter,
                        &-leave-to {
                            opacity: 0;
                            position: absolute;
                            top: 0;
                            left: 0;
                        }
                    }

                    &.next-enter,
                    &.prev-leave-to {
                        transform: translateX(30%);
                    }

                    &.next-leave-to,
                    &.prev-enter {
                        transform: translateX(-30%);
                    }
                }
            }

            &__cta {
                font-size: 2.4rem;
                color: $color-primary-main;
                padding: 1.5rem 0;

                &:first-child {
                    padding-right: 1.5rem;
                }

                &:last-child {
                    padding-left: 1.5rem;
                }
            }
        }
    }
</style>