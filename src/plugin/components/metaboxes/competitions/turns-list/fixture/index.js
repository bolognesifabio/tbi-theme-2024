import props from './_props'
import methods from './_methods'
import template from './_template'

export default {
    props,
    methods,
    template,
    components: {
        'tbi-fixture-team-selection': () => import('../team-selection')
    }
}