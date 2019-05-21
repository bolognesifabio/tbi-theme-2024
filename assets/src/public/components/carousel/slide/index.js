import computed from './_computed'
import template from './_template'

export default {
    props: ['active_slide', 'slide', 'base_class', 'stop_autoplay', 'resume_autoplay'],
    computed: computed,
    template: template
}