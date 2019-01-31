import data from './_data'
import computed from './_computed'
import beforeMount from './_before-mount'
import methods from './methods'
import style from './style.scss'

console.log(methods)

export default {
    props: ['turns_input'],
    data,
    computed,
    beforeMount,
    methods,
    style,
    components: {
        'tbi-fixture-team-selection': () => import('../fixture-team-selection')
    }
}