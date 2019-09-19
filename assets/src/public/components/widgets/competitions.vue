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

                let { data } = await axios.get(`${window.location.protocol}//${window.location.host}/index.php/wp-json/tbi/v1/competition?id=${competition.id}`)
                data.is_active = false
                if (data.type === 'leagues') data.are_standings_active = true

                return data
            }))
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../styles/constants';
    @import '../../styles/mixins';

    .nav {
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
                padding: .75rem 1.5rem;

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
            padding: 1.5rem 0;

            &:first-child {
                padding-right: 1.5rem;
            }

            &:last-child {
                padding-left: 1.5rem;
            }
        }
    }

    .slides {
        position: relative;
        overflow: hidden;
        margin-top: 3rem;

        &__item {
            width: 100%;
            padding: 0 1.5rem;

            &__tabs {
                display: flex;

                &__cta {
                    flex-basis: 50%;
                    background: $color-light-bg-variant;
                    color: $color-primary-main;
                    border-bottom: .1rem solid $color-borders-dark;
                    padding: .75rem 1.5rem;
                    font-size: 1.6rem;
                    font-weight: 600;
                    position: relative;
                    transition: all .2s ease-in-out;

                    &:before {
                        @include gradient($color-fuchsia-main, $color-violet-main);
                        content: " ";
                        opacity: 0;
                        height: .4rem;
                        width: 100%;
                        position: absolute;
                        top: 0;
                        left: 0;
                        transition: all .2s ease-in-out;
                    }

                    &--active {
                        background: $color-light-bg;
                        border-bottom: .1rem solid transparent;

                        &:before {
                            opacity: 1;
                        }
                    }
                }
            }

            &__standings {
                width: 100%;
                margin-top: 3rem;

                th, td {
                    padding: .75rem;
                    text-align: center;

                    &:first-child {
                        padding-left: 1.5rem;
                    }

                    &:last-child {
                        padding-right: 1.5rem;
                    }

                    &.team {
                        text-align: left;
                        width: 100%;
                        color: $color-fg-accent;
                    }

                    &.played {
                        padding: .75rem 1.5rem;
                    }
                }

                td {
                    font-size: 1.4rem;
                    border-bottom: .1rem solid $color-borders;
                    padding-top: 1.5rem;
                    padding-bottom: 1.5rem;

                    &.position,
                    &.points {
                        color: $color-primary-main;
                        font-weight: 800;
                    }
                }

                &__head {
                    font-size: 1.2rem;
                    font-weight: 600;
                }

                &__body {
                    .emblem {
                        &__img {
                            max-width: 2rem;
                            max-height: 2rem;
                            height: auto;
                        }
                    }
                }

                &__head {
                    background: $color-light-bg-variant;
                    color: $color-fg-accent;
                }
            }
        }
    }

    .nav__competitions__item,
    .slides__item {
        &.next,
        &.prev {
            &-enter-active,
            &-leave-active {
                transition: all .4s ease-in-out;
            }

            &-enter,
            &-leave-to {
                opacity: 0;
            }

            &-enter-active {
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

    .fixture {
        td {
            font-size: 1.4rem;
            border-bottom: .1rem solid $color-borders;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        &__emblem {
            &__img {
                max-width: 2rem;
                max-height: 2rem;
                height: auto;
            }
        }
    }
</style>