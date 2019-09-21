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
            },

            are_both_columns_visible() {
                let { is_ge_tablet, is_ge_desktop, is_ge_large_desktop } = this.$root.viewport

                if (is_ge_large_desktop || is_ge_desktop) return this.model.sidebar === "home_main"
                return is_ge_tablet
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

    .standings,
    .fixtures {
        &__title {
            display: none;
        }
    }

    .standings,
    .fixtures__day__list {
        width: 100%;

        &__head,
        &__row {
            padding: .75rem;
            display: grid;
            grid-template-rows: 1fr;
            align-items: center;

            &__team {
                color: $color-fg-accent;
            }
        }

        &__row {
            font-size: 1.4rem;
            border-bottom: .1rem solid $color-borders;
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;

            &__team {
                display: flex;
                align-items: center;

                &__emblem {
                    padding-right: .75rem;

                    &__img {
                        max-width: 2rem;
                        max-height: 2rem;
                        height: auto;
                    }
                }
            }
        }
    }

    .standings {
        margin-top: 3rem;

        &__head,
        &__row {
            text-align: center;
            grid-template-columns: 4rem 1fr 4rem 4rem;

            > * {
                &:nth-child(1) {
                    grid-column: 1;
                }

                &:nth-child(2) {
                    grid-column: 2;
                }

                &:nth-child(3) {
                    grid-column: 3;
                }

                &:nth-child(4) {
                    grid-column: 4;
                }
            }

            &__team {
                text-align: left;
            }
        }

        &__head {
            font-size: 1.2rem;
            font-weight: 600;
            background: $color-light-bg-variant;
            color: $color-fg-accent;
        }

        &__row {
            &__position,
            &__points {
                @include font-title;
                color: $color-primary-main;
                font-weight: 900;
            }

            &__played {
                @include font-title;
            }
        }
    }

    .fixtures {
        &__turn {
            margin: 0;
            padding: 2rem 0;
            width: 100%;
            font-size: 1.2rem;
            text-align: center;
            text-transform: uppercase;
            color: $color-primary-4;
            font-weight: 900;

            &__icon {
                margin-right: .3rem;
            }
        }

        &__day {
            padding-bottom: 3rem;

            &:last-child {
                padding-bottom: 0;
            }

            &__date {
                font-size: 1.4rem;
                font-weight: 400;
                text-align: center;
                color: $color-fg-accent;
                margin: 0;
                padding: .4rem 0;
            }

            &__list {
                &__row {
                    padding: 1.5rem 0;
                    grid-template-columns: 1fr 4rem 1rem 4rem 1fr;

                    > * {
                        grid-row: 1;
                        padding: 0;

                        &:nth-child(1) {
                            grid-column: 1;
                        }

                        &:nth-child(2) {
                            grid-column: 2;
                        }

                        &:nth-child(3) {
                            grid-column: 3;
                        }

                        &:nth-child(4) {
                            grid-column: 4;
                        }

                        &:nth-child(5) {
                            grid-column: 5;
                        }
                    }

                    &:first-child {
                        border-top: .1rem solid $color-borders;
                    }

                    &__team {
                        &:last-child {
                            text-align: right;
                            justify-content: flex-end;
                        }

                        &:last-child & {
                            &__emblem {
                                padding-right: 0;
                                padding-left: .75rem;
                            }
                        }
                    }

                    &__score,
                    &__separator {
                        @include font-title;
                        font-size: 1.4rem;
                        font-weight: 900;
                        color: $color-primary-main;
                        text-align: center;
                    }
                }
            }
        }
    }

    .widget__footer {
        border-top: none;
    }

    .slides--full {
        margin-top: 2rem;
            
        .slides__item {
            display: grid;
            grid-template-columns: 1fr minmax(0, 1fr);
            grid-template-rows: 1fr;
            grid-column-gap: 1.5rem;
        }

        .standings,
        .fixtures {
            &__title {
                display: block;
                margin: 0;
                padding: 0 0 .75rem;
                text-align: center;
            }
        }

        .standings {
            grid-column: 1;
            grid-row: 1;
            margin-top: 0;
        }

        .fixtures {
            grid-column: 2;
            grid-row: 1;

            &__day {
                padding-bottom: 1.5rem;
            }

            &__turn {
                background: $color-light-bg-variant;
                padding: .75rem 0;
                margin-bottom: 1.5rem;
                color: $color-fg-accent;
            }
        }
    }

    @include media-tablet {
        .standings,
        .fixtures__day__list {
            &__row {
                font-size: 1.2rem;
                padding-top: 1rem;
                padding-bottom: 1rem;
            }
        }

        .fixtures__day__list {
            &__row {
                &__score,
                &__separator {
                    font-size: 1.2rem;
                }
            }
        }
    }
</style>