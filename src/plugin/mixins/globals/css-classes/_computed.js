export default {
    base_class() {
        return this.$options.name || this.$options._componentTag || ""
    }
}