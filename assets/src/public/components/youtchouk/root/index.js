import data from './_data'
import created from './_created'
import methods from './_methods'
import template from './_template'
import player from '../player'
import video from '../video'

export default {
    data: data,
    components: {
        'tbi-vue-youtchouk-player': player,
        'tbi-vue-youtchouk-video': video
    },
    methods: methods,
    created: created,
    template: template
}