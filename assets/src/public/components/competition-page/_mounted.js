export default function() {
    this.slides = JSON.parse(this.$el.dataset.slides)
    this.$el.dataset.slides = ""
}