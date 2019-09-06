<script>
    export default {
        computed: {
            is_open: {
                get() {
                    return this.$root.header.is_search_open
                },

                set(is_open) {
                    this.$root.header.is_menu_open = false
                    this.$root.header.is_search_open = is_open

                    if (is_open) {
                        setTimeout(() => {
                            this.$refs.input.focus()
                        }, 300)
                    }

                    if (is_open && !this.is_viewport_desktop) this.$root.html.classList.add('scroll-locked')
                    else this.$root.html.classList.remove('scroll-locked')
                }
            },

            is_viewport_desktop() {
                return this.$root.viewport.is_ge_desktop
            }
        },

        methods: {
            toggle() {
                this.is_open = !this.is_open
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../styles/constants';
    @import '../../styles/mixins';

    .search {
        height: 6rem;
        width: 6rem;
        padding: .75rem 0;

        &__toggle {
            color: $color-fg-variant;
            height: 100%;
            width: 100%;
            font-size: 1.8rem;
            grid-row: 1;
            grid-column: 3;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        &__layer {
            @include gradient($color-green-main, $color-violet-main, bottom);
            position: absolute;
            top: 6.5rem;
            left: 0;
            width: 100vw;
            height: calc(100vh - 6.5rem);
            z-index: -1;
            opacity: .9;

            &.fade-enter,
            &.fade-leave-to {
                opacity: 0;
            }
        }

        &__form {
            position: absolute;
            width: 100%;
            height: 6rem;
            top: 6.5rem;
            left: 0;
            background: $color-light-bg;
            display: grid;
            grid-template-columns: 1fr minmax(0, max-content);
            grid-template-rows: 1fr;

            &-enter-active {
                transition: all .3s ease-out;
            }

            &-leave-active {
                transition: all .3s ease-in;
            }

            &-enter {
                opacity: 0;
                height: 0;
            }

            &-leave-to {
                opacity: 0;
                height: 0;
            }

            &__input {
                @include font-content;
                border: none;
                height: 100%;
                padding: 0 1.5rem;
                font-size: 2.4rem;
                grid-column: 1;
                grid-row: 1;

                &:focus {
                    outline: none;
                }

                &::placeholder {
                    color: $color-primary-8;
                }
            }

            &__button {
                font-size: 1.8rem;
                width: 6rem;
                height: 100%;
                color: $color-red-main;
                grid-column: 2;
                grid-row: 1;
            }
        }

        @include media-desktop {
            grid-row: 2;
            grid-column: 3;
            background: $color-primary-main;
        }
    }
</style>