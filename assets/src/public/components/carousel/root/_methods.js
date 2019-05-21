export default {
    switch_slide(id) {
        this.active_slide = id
        this.stop_autoplay()
        this.resume_autoplay()
    },
    stop_autoplay() {
        window.clearInterval(this.interval)
    },
    resume_autoplay() {
        if (this.autoplay) {
            this.interval = setInterval(_ => {
                this.active_slide = this.get_next_prev_slide(true)
            }, this.timing)
        }
    },
    get_next_prev_slide(need_next) {
        let slides = this.slides
        let index = slides.findIndex(slide => {
            return slide.id === this.active_slide
        })

        need_next ? index++ : index--
        this.going_next = need_next
        this.going_prev = !need_next
        return index >= slides.length ? slides[0].id : index < 0 ? slides[slides.length - 1].id : slides[index].id
    }
}