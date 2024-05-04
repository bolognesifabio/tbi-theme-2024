<script>
    import axios from 'axios'

    import data_model_mixin from '../mixins/data-model.vue'

    export default {
        mixins: [ data_model_mixin ],

        components: {
            "tbi-competition-turns": () => import('../shared/turns.vue')
        },

        data() {
            return {
                slide: 'next'
            }
        },

        computed: {
            competitions: {
                get() {
                    if (!this.model || !this.model.competitions) return []
                    return this.model.competitions
                },

                set(competitions) {
                    this.model.competitions = competitions
                }
            },

            loaded_competitions() {
                if (!this.competitions.length) return []

                return this.competitions.filter(competition => {
                    return competition.turns
                })
            },

            active_index() {
                return this.loaded_competitions.findIndex(competition => {
                    return competition.is_active
                })
            },

            season() {
                return this.competitions[0].season
            }
        },

        methods: {
            next_slide() {
                this.slide = 'next'
                
                const
                    LOADED_COMPETITIONS = this.loaded_competitions,
                    NEXT_INDEX = this.active_index + 1 >= LOADED_COMPETITIONS.length ? 0 : this.active_index + 1

                this.competitions = this.competitions.map((competition, index) => {
                    competition.is_active = index === NEXT_INDEX
                    return competition
                })                
            },

            prev_slide() {
                this.slide = 'prev'
                
                const
                    LOADED_COMPETITIONS = this.loaded_competitions,
                    PREV_INDEX = this.active_index - 1 < 0 ? LOADED_COMPETITIONS.length - 1 : this.active_index - 1

                this.competitions = this.competitions.map((competition, index) => {
                    competition.is_active = index === PREV_INDEX
                    return competition
                })                
            }
        },

        async mounted() {
            if (!this.competitions.length) return

            try {
                this.competitions = await Promise.all(this.competitions.map(async (competition, index) => {
                    if (competition.turns) return competition 
    
                    let { data } = await axios.get(`${window.location.protocol}//${window.location.host}/index.php/wp-json/tbi/v1/widgets/competition?id=${competition.id}`)
    
                    return data
                }))
            } catch (error) {
                console.log(error)
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../styles/constants';
    @import '../../styles/mixins';

    .nav {
        display: flex;
        margin: 0 1.5rem;
        /* autoprefixer: ignore next */
        align-items: center;
        border-bottom: .1rem solid $color-borders;

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

        &__item {
            width: 100%;
            padding: 0 1.5rem;

            &__tabs {
                display: flex;
                margin-top: 3rem;

                &__cta {
                    flex-basis: 50%;
                    background: $color-light-bg-variant;
                    color: $color-primary-main;
                    border-bottom: .1rem solid $color-primary-7;
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

    .widget__footer {
        border-top: none;
    }

    .standings {
        &__head,
        &__row {
            &__cell {
                &--team {
                    grid-column: 2 / span 4;
                }
                
                &--details {
                    display: none;
                }
            }
        }

        &__row {
            &__cell {
                .team {
                    &__name {
                        &--short {
                            display: none;
                        }

                        &--full {
                            display: block;
                        }
                    }
                }
            }
        }
    }

    @include media-tablet {
        .slides {
            &__item {
                .standings {
                    display: none;

                    &__head,
                    &__row {
                        &__cell {
                            &--team {
                                grid-column: 2;
                            }

                            &--details {
                                display: block;
                            }
                        }
                    }
                }

                &--league {
                    .standings {
                        display: block;
                    }
                }
            }
        }
    }
</style>

<style lang="scss">
    @import '../../styles/mixins';

    .home__sidebar__widget .widget--competitions {
        @include media-desktop {
            .standings {
                &__head,
                &__row {
                    &__cell {
                        &--team {
                            grid-column: 2 / span 4;
                        }

                        &--details {
                            display: none;
                        }
                    }
                }
            }

            .fixtures {
                &__header,
                &__turn__child__title,
                &__turn__child__day__date {
                    justify-content: center;
                    text-align: center;
                }
            }

            .fixture {
                grid-template-columns: 1fr 4rem 1rem 4rem 1fr 0;

                &__team__name {
                    &--short {
                        display: block;
                    }
                    
                    &--full {
                        display: none;
                    }
                }

                &__venue {
                    display: none;
                }
            }
        }
    }
</style>