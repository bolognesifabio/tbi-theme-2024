import props from './_props'
import data from './_data'
import computed from './_computed'
import created from './_created'
import methods from './_methods'
import template from './_template'
import style from './style.scss'

export default {
    props,
    data,
    computed,
    created,
    methods,
    template,
    style,
    components: {
        'tbi-fixture-team-selection': () => import('../fixture-team-selection')
    }
}