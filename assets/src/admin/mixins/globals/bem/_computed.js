export default {
    bem_base() {
        return this.$options.name || this.$options._componentTag || ""
    }
}