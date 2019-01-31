import data from './_data'
import computed from './_computed'
import beforeMount from './_before-mount'
import methods from './_methods'
import style from './style.scss'

export default {
    props: ['turns_input'],
    data,
    computed,
    beforeMount,
    methods,
    style,
    components: {
        'tbi-find-as-you-type': () => import('../../../find-as-you-type')
    }
}