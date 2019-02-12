import props from './_props'
import methods from './_methods'

import style from './style.scss'

export default {
    props,
    methods,
    components: {
        'tbi-fixture-team-selection': () => import('../team-selection')
    },
    style
}