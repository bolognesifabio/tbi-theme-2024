import created from './_created'
import computed from './_computed'
import methods from './_methods'

export default {
    props: ['turns_input'],
    created,
    computed,
    methods,
    components: {
        'tbi-competitions-turn': () => import('./turn'),
        'tbi-competitions-fixture': () => import('./fixture'),
        'tbi-fixture-team-selection': () => import('../fixture-team-selection')
    }
}