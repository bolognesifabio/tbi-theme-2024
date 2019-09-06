<script>
    import data_model_mixin from '../mixins/data-model.vue'

    export default {
        mixins: [ data_model_mixin ],

        computed: {
            is_open: {
                get() {
                    return this.$root.header.is_menu_open
                },

                set(is_open) {
                    this.$root.header.is_search_open = false
                    this.$root.header.is_menu_open = is_open

                    if (is_open && !this.is_viewport_desktop) this.$root.html.classList.add('scroll-locked')
                    else this.$root.html.classList.remove('scroll-locked')
                }
            },

            is_one_selected() {
                return this.model.menu.find(menu_item => {
                    return menu_item.is_selected
                }) ? true : false
            },

            is_viewport_desktop() {
                return this.$root.viewport.is_ge_desktop
            }
        },

        methods: {
            toggle_menu() {
                this.is_open = !this.is_open
            },

            toggle_sub_menu(selected_menu_item) {
                const CURRENT_STATUS = selected_menu_item.is_selected

                this.model.menu.forEach(menu_item => { menu_item.is_selected = false })
                
                if (this.is_viewport_desktop) selected_menu_item.is_selected = !CURRENT_STATUS
                else selected_menu_item.is_selected = true
            }
        }
    }
</script>

<style lang="scss">
    .header {
        opacity: 1;
    }
</style>

<style lang="scss" scoped>
    @import "../../styles/constants";
    @import "../../styles/mixins";

    $color-menu-item-active: $color-primary-4;

    .nav {
        grid-row: 1;
        grid-column: 1;
        position: relative;

        &__toggle {
            color: $color-fg-variant;
            height: 6rem;
            width: 6rem;
            font-size: 2rem;
        }

        &__layer,
        &__menu,
        &__menu__item__sub-menu {
            position: absolute;
            top: 6.5rem;
            left: 0;
            height: calc(100vh - 6.5rem);
        }

        &__layer {
            width: 100vw;
            background: $color-light-bg;
        }

        &__menu {
            @include font-title;
            width: 50vw;
            background: $color-primary-2;

            &__item {
                &--open {
                    background: $color-menu-item-active;
                }

                &__cta,
                &__sub-menu__item__cta {
                    @include font-title;
                    color: $color-fg-variant;
                    text-decoration: none;
                    display: flex;
                    justify-content: space-between;
                    padding: 1.5rem;
                    align-items: center;
                    font-size: 1.4rem;
                    font-weight: 500;
                    width: 100%;
                    cursor: pointer;
                }

                &__sub-menu {
                    width: 50vw;
                    left: 50vw;
                    top: 0;
                    background: $color-light-bg;

                    &__item {
                        border-bottom: .1rem solid $color-borders;

                        &__cta {
                            color: $color-primary-main;
                            font-weight: 400;
                            cursor: pointer;
                            padding: 1.5rem;
                        }
                    }

                    &-enter-active {
                        transition: all .2s .2s ease-out;
                    }

                    &-leave-active {
                        transition: all .2s ease-in;
                    }

                    &-enter {
                        opacity: 0;
                        transform: translateX(3rem);
                    }

                    &-leave-to {
                        opacity: 0;
                        transform: translateX(0);
                    }
                }
            }
        }

        @include media-tablet {
            &__menu {
                width: 30vw;

                &__item__sub-menu {
                    width: 70vw;
                    left: 30vw;
                }
            }
        }
        
        @include media-desktop {
            grid-row: 2;
            grid-column: 2;
            position: static;
            height: 6rem;
            display: flex;
            
            &:before {
                content: " ";
                height: 6rem;
                min-width: 4rem;
                max-width: 4rem;
                background-image: url("/wp-content/themes/tbi-theme/assets/img/header-left-border.png");
                background-repeat: no-repeat;
                background-size: cover;
            }

            &__menu {
                background: $color-primary-main;
                position: static;
                top: 0;
                display: flex;
                height: 100%;
                width: 100%;

                &__item {
                    display: flex;
                    align-items: center;
                    transition: all .2s ease-in-out;

                    &:hover {
                        background: $color-menu-item-active;
                    }

                    &__cta {
                        justify-content: flex-start;

                        &__icon {
                            margin-left: .75rem;
                        }
                    }

                    &--open & {
                        &__cta {
                            &__icon {
                                transform: rotate(180deg);
                            }
                        }
                    }

                    &__sub-menu {
                        z-index: -1;
                        left: 0;
                        top: 11rem;
                        width: 100vw;
                        height: 5rem;
                        display: flex;
                        background: $color-light-bg-variant;

                        &__item {
                            border-bottom: none;
                            display: flex;
                            align-items: center;
                            position: relative;

                            &__cta {
                                font-size: 1.3rem;
                            }
                            
                            &:after {
                                @include gradient($color-green-main, $color-violet-main);
                                content: " ";
                                position: absolute;
                                bottom: 0;
                                left: 0;
                                width: 100%;
                                height: .4rem;
                                max-height: 0;
                                transition: all .2s ease-in-out;
                            }

                            &:hover {
                                &:after {
                                    max-height: 1rem;
                                }
                            }
                        }

                        &-enter {
                            transform: translateY(-30%) translateX(0);
                        }

                        &-leave-to {
                            transform: translateY(0);
                        }
                    }
                }
            }
        }
    }
</style>