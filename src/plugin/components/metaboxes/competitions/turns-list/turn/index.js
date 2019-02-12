import data from './_data'
import props from './_props'
import methods from './_methods'
import computed from './_computed'

import style from './style.scss'

export default {
    data,
    props,
    methods,
    computed,
    components: {
        'tbi-competitions-fixture': () => import('../fixture')
    },
    style
}