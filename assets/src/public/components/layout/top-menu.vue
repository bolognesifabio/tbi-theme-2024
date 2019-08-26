<script>
    import data_model_mixin from '../mixins/data-model.vue'

    export default {
        mixins: [ data_model_mixin ],

        mounted() {
            // this.model.menu[0] = "asdada"
        },

        computed: {
            is_one_selected() {
                return this.model.menu.find(menu_item => {
                    return menu_item.is_selected
                }) ? true : false
            }
        },

        methods: {
            open_sub_menu(selected_menu_item) {
                this.model.menu.forEach(menu_item => { menu_item.is_selected = false })
                selected_menu_item.is_selected = true
            }
        }
    }
</script>