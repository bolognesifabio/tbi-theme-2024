export default {
    slides(slides) {
        this.active_slide = slides.length > 0 ? slides[0].id : 0
    }
}