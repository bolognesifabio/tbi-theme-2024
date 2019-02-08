import data from './_data'
import props from './_props'
import methods from './_methods'

import style from './style.scss'

export default {
    data,
    props,
    methods,
    components: {
        'tbi-competitions-fixture': () => import('../fixture')
    },
    style
}