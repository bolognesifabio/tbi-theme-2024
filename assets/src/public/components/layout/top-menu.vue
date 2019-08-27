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
            }
        },

        methods: {
            toggle_menu() {
                this.is_open = !this.is_open
            },

            open_sub_menu(selected_menu_item) {
                this.model.menu.forEach(menu_item => { menu_item.is_selected = false })
                selected_menu_item.is_selected = true
            }
        },

        mounted() {
            this.is_open = this.is_viewport_desktop
        },

        watch: {
            is_viewport_desktop() {
                if (this.is_viewport_desktop) this.is_open = true
            }
        }
    }
</script>

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
        height: 100%;
        padding: 1.5rem;
        width: 1.8rem;
        font-size: 1.8rem;
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
        z-index: -3;
        background: $color-neutral-lightest;
    }

    .menu {
        width: 50vw;
        z-index: -1;
        font-family: 'Heebo', sans-serif;
        font-weight: 500;
        background: $color-primary-dark;

        &__item {
            padding: 1.5rem;

            a {
                color: $color-primary-lightest;
                text-decoration: none;
                display: flex;
                justify-content: space-between;
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
        z-index: -2;
        background: $color-neutral-lightest;

        &__item {
            padding: 1.5rem;
            border-bottom: .1rem solid $color-primary-light;

            a {
                color: $color-primary-main;
                font-weight: 400;
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
        .menu {
            position: relative;
            background: $color-primary-main;
            height: 6rem;
            border-top-left-radius: 1rem;
        
            &:before {
                content: " ";
                position: absolute;
                height: 6rem;
                width: 4rem;
            }
        }
    }
</style>