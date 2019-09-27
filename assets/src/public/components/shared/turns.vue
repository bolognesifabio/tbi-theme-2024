<script>
    export default {
        props: {
            turns: {
                type: [Array, Object],
                default: []
            },

            teams: {
                type: [Array, Object],
                default: {}
            }
        },

        data() {
            return {
                selected_turn_index: 0
            }
        },

        beforeMount() {
            this.selected_turn_index = this.turns.findIndex(turn => {
                return turn.is_active
            }) || 0
        },

        computed: {
            has_multiple_turns() {
                return this.turns.length > 1
            },

            selected_turn() {
                return this.turns[this.selected_turn_index]
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../styles/constants.scss';
    @import '../../styles/mixins.scss';

    .fixtures {
        width: 100%;

        &__title {
            display: none;
            margin: 0;
            padding: 0 0 .75rem;
            text-align: center;
        }

        &__header {
            margin: 0;
            padding: 2rem 0;
            width: 100%;
            font-size: 1.2rem;
            display: flex;
            justify-content: center;
            /* autoprefixer: ignore next */
            align-items: center;
            text-transform: uppercase;
            color: $color-primary-4;
            font-weight: 900;

            &__icon {
                margin-right: .3rem;
            }

            &__title {
                margin: 0;
            }
        }

        &__turn {
            &__child {
                padding-bottom: 2rem;

                &:last-child {
                    padding-bottom: 0;
                }

                &__title {
                    font-size: 1.6rem;
                    font-weight: 700;
                    margin: 0;
                    text-align: center;
                    padding-bottom: .4rem;
                }

                &__day {
                    padding-bottom: 2rem;

                    &:last-child {
                        padding-bottom: 0;
                    }

                    &__date {
                        font-size: 1.4rem;
                        font-weight: 400;
                        text-align: center;
                        color: $color-fg-accent;
                        margin: 0;
                        padding-bottom: .4rem;
                    }
                }
            }
        }
    }

    .fixture {
        padding: 1.5rem 0;
        grid-template-columns: 1fr 4rem 1rem 4rem 1fr minmax(0, auto);
        grid-template-rows: 1fr;
        display: grid;
        /* autoprefixer: ignore next */
        align-items: center;
        font-size: 1.4rem;
        border-top: .1rem solid $color-borders;

        &:last-child {
            border-bottom: .1rem solid $color-borders;
        }

        > * {
            grid-row: 1;
            padding: 0;

            &:nth-child(1) { grid-column: 1; }
            &:nth-child(2) { grid-column: 2; }
            &:nth-child(3) { grid-column: 3; }
            &:nth-child(4) { grid-column: 4; }
            &:nth-child(5) { grid-column: 5; }
            &:nth-child(6) { grid-column: 6; }
        }

        &__team {
            color: $color-fg-accent;
            display: flex;
            /* autoprefixer: ignore next */
            align-items: center;

            &__emblem {
                padding-right: .75rem;

                &__img {
                    max-width: 2rem;
                    max-height: 2rem;
                    height: auto;
                }
            }

            &__name {
                &--full {
                    display: none;
                }
            }

            & ~ & {
                text-align: right;
                justify-content: flex-end;

                & &__emblem {
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

        &__venue {
            display: none;
        }
    }

    @include media-tablet {
        .fixture {
            font-size: 1.2rem;
            padding-top: 1rem;
            padding-bottom: 1rem;

            &__score,
            &__separator {
                font-size: 1.2rem;
            }
        }
    }
</style>