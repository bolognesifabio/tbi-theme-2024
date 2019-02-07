import created from './_created'
import methods from './_methods'

export default {
    props: ['turns_input'],
    created,
    methods,
    components: {
        'tbi-competitions-turn': () => import('./turn'),
        'tbi-competitions-fixture': () => import('./fixture')
    }
}