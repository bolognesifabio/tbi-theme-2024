export default function() {
    this.info = JSON.parse(this.$el.dataset.info)
    this.$el.dataset.info = ""
}