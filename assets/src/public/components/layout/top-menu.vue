<script>
    import data_model_mixin from '../mixins/data-model.vue'

    export default {
        mixins: [ data_model_mixin ],

        data() {
            return {
                is_open: false
            }
        },

        computed: {
            is_one_selected() {
                return this.model.menu.find(menu_item => {
                    return menu_item.is_selected
                }) ? true : false
            },

            is_viewport_desktop() {
                return this.$root.viewport.is_ge_desktop
            },

            is_scroll_locked() {
                return this.is_open && !this.is_viewport_desktop
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
        },

        watch: {
            is_scroll_locked() {
                if (this.is_scroll_locked) this.$root.body.classList.add('scroll-locked')
                else this.$root.body.classList.remove('scroll-locked')
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

    nav {
        grid-row: 1;
        grid-column: 1;
        position: relative;
    }

    .toggle-menu {
        color: $color-primary-lightest;
        height: 6rem;
        width: 6rem;
        font-size: 2rem;
    }

    .layer,
    .menu,
    .sub-menu {
        position: absolute;
        top: 6.5rem;
        left: 0;
        height: calc(100vh - 6.5rem);
    }

    .layer {
        width: 100vw;
        background: $color-neutral-lightest;
    }

    .menu {
        width: 50vw;
        font-family: 'Heebo', sans-serif;
        font-weight: 500;
        background: $color-primary-dark;

        &__item {
            a {
                color: $color-primary-lightest;
                text-decoration: none;
                display: flex;
                justify-content: space-between;
                padding: 1.5rem;
                align-items: center;
                cursor: pointer;
            }

            &--open {
                background: $color-primary-accent;
            }
        }
    }

    .sub-menu {
        width: 50vw;
        left: 50vw;
        top: 0;
        background: $color-neutral-lightest;

        &__item {
            border-bottom: .1rem solid $color-primary-light;

            a {
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
            transform: translateX(30%);
        }

        &-leave-to {
            opacity: 0;
            transform: translateX(0);
        }
    }

    @include media-tablet {
        .menu {
            width: 30vw;
        }

        .sub-menu {
            width: 70vw;
            left: 30vw;
        }
    }
    
    @include media-desktop {
        .toggle-menu {
            display: none;
        }

        nav {
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
        }

        .menu {
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
                    background: $color-primary-accent;
                }

                a {
                    justify-content: flex-start;

                    .icon {
                        margin-left: .75rem;
                    }
                }
            }
        }

        .sub-menu {
            z-index: -1;
            left: 0;
            top: 11rem;
            width: 100vw;
            height: 6rem;
            display: flex;
            background: $color-primary-lightest;

            &__item {
                border-bottom: none;
                display: flex;
                align-items: center;
                position: relative;
                
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
</style>