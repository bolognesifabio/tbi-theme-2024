import props from './_props'
import data from './_data'
import template from './_template'
import methods from './_methods'
import watch from './_watch'
import computed from './_computed'

import slide from '../slide'
import navigation from '../navigation'
import arrows from '../arrows'

export default {
    props: props,
    data: data,
    components: {
        'tbi-vue-carousel-slide': slide,
        'tbi-vue-carousel-navigation': navigation,
        'tbi-vue-carousel-arrows': arrows
    },
    methods: methods,
    mounted() { this.resume_autoplay() },
    created() { this.active_slide = this.starting_slide || 0 },
    watch: watch,
    computed: computed,
    template: template
}