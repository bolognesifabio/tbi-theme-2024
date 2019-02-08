import props from './_props'
import methods from './_methods'

export default {
    props,
    methods,
    components: {
        'tbi-fixture-team-selection': () => import('../team-selection')
    }
}