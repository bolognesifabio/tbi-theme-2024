import mounted from './_mounted'
import template from './_template'
import updated from './_updated'

export default {
    props: ['activeVideo', 'formatDate'],
    data: function () {
        return {
            player: new Object()
        }
    },
    mounted: mounted,
    updated: updated,
    template: template
}