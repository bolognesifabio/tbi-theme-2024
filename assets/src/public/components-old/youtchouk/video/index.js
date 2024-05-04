import methods from './_methods'
import template from './_template'

export default {
    props: ['activeVideo', 'video', 'formatDate'],
    data() {
        return {
            title: this.excerptTitle()
        }
    },
    methods: methods,
    template: template
}