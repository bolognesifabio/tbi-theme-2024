<script>
    import Vue from 'vue'

    export default {
        props: {
            view_model: {
                default: {}
            }
        },

        data() {
            return {
                model: {}
            }
        },

        mounted() {
            this.model = JSON.parse(this.view_model)
        }
    }
</script>