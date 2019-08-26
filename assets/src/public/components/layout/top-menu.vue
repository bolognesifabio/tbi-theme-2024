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
    nav {
    }

    .layer,
    .menu,
    .sub-menu {
        position: fixed;
        top: 0;
        left: 0;
    }

    .layer {
        height: 100vh;
        width: 100vw;
        
        background: rgba(black, .5);
    }

    .menu {
        z-index: 8;
        background: blue;

    }

    .sub-menu {
        z-index: 7;
        left: 50%;
        background: white;
    }
</style>