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

            is_open_button_visible() {
                return !this.$root.viewport.is_ge_desktop
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
        }
    }
</script>

<style lang="scss" scoped>
    @import "../../styles/constants";

    nav {
        grid-row: 1;
        grid-column: 1;
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
        position: fixed;
        top: 6.5rem;
        left: 0;
    }

    .layer {
        height: 100vh;
        width: 100vw;
        z-index: -3;
        background: rgba($color-primary-dark, .5);
    }

    .menu {
        width: 50%;
        height: 100%;
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
        width: 50%;
        height: 100%;
        left: 50%;
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
    }
</style>