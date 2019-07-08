<script>
    export default {
        data() {
            return {
                tabs: []
            }
        },

        mounted() {
            this.tabs = JSON.parse(this.$el.dataset.tabs)
            this.$el.dataset.tabs = ""
        }
    }
</script>

<style lang="scss" scoped>
    
</style>